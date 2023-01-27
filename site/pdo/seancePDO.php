<?php

require_once('pdo/database.php');
require_once('model/seance.php');

class SeancePDO
{
    public DBConnection $connection;
    private array $donnees = array();

    // Return 1 session from database
    function getSeance(int $id_seance): Seance
    {
        $MySQLQuery = 'SELECT * FROM seance WHERE id_seance = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$id_seance]);
        $seance = null;
        if (array_key_exists($id_seance, $this->donnees)) {
            $seance = $this->donnees[$id_seance];
        } else {
            while ($row = $stmt->fetch()) {
                $id_seance = $row['id_seance'];
                $piscinePDO = new PiscinePDO();
                $piscinePDO->connection = new DBConnection();
                $piscine = $piscinePDO->read($row["id_piscine"]);
                $activitePDO = new ActivitePDO();
                $activitePDO->connection = new DBConnection();
                $activite = $activitePDO->read($row["id_activite"]);
                $dateheure = $row['dateheure'];
                $professeur = $row['professeur'];
                $capacite = $row['capacite'];
                $seance = new Seance($piscine, $activite, $dateheure, $professeur, $capacite, 1, $id_seance);
                $this->donnees[$id_seance] = $seance;
            }
        }
        return $seance;
    }

    function getOccupation(Seance $seance): int
    {
        $MySQLQuery = 'SELECT COUNT(*) as occupation
        FROM code_seance cs
        WHERE cs.id_seance = ?';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$seance->getId_seance()]);
        while ($row = $stmt->fetch()) {
            $occupation = $row['occupation'];
        }
        return $occupation;
    }

    function alreadyReserved(Code $code, Seance $seance): bool
    {
        $MySQLQuery = 'SELECT * FROM code_seance cs WHERE cs.id_code = ? AND cs.id_seance = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$code->getId_code(), $seance->getId_seance()]);
        if ($row = $stmt->fetch()) {
            return true;
        } else {
            return false;
        }
    }

    // Return all available sessions for a given activity
    function getSeancesDispo(Activite $activite): array
    {
        $MySQLQuery = 'SELECT s.id_seance, s.id_piscine, s.id_activite,
        s.dateheure, s.professeur, s.capacite
        FROM seance s
        LEFT JOIN code_seance cs ON (s.id_seance = cs.id_seance)
        WHERE s.id_activite = ? AND s.actif = 1
        GROUP BY s.id_seance
        ORDER BY s.id_piscine';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$activite->getId_activite()]);
        $seances = [];
        while ($row = $stmt->fetch()) {
            $id_seance = $row['id_seance'];
            $piscinePDO = new PiscinePDO();
            $piscinePDO->connection = new DBConnection();
            $piscine = $piscinePDO->read($row["id_piscine"]);
            $activitePDO = new ActivitePDO();
            $activitePDO->connection = new DBConnection();
            $activite = $activitePDO->read($row["id_activite"]);
            $dateheure = $row['dateheure'];
            $professeur = $row['professeur'];
            $capacite = $row['capacite'];
            $seance = new Seance($piscine, $activite, $dateheure, $professeur, $capacite, 1, $id_seance);
            $seances[] = $seance;
        }
        return $seances;
    }
}
