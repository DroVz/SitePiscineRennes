<?php

require_once('pdo/database.php');
require_once('model/seance.php');

class SeancePDO {
    public DBConnection $connection;

    // Return 1 session from database
    function getSeance(int $id_seance): Seance
    {
        $MySQLQuery = 'SELECT * FROM seance WHERE id_seance = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$id_seance]);
        while ($row = $stmt->fetch()) {
            $id_seance = $row['id_seance'];
            $piscinePDO = new PiscinePDO();
            $piscinePDO->connection = new DBConnection();
            $piscine = $piscinePDO->getPiscine($row["id_piscine"]);
            $activitePDO = new ActivitePDO();
            $activitePDO->connection = new DBConnection();
            $activite = $activitePDO->getActivite($row["id_activite"]);
            $dateheure = $row['dateheure'];
            $professeur = $row['professeur'];
            $capacite = $row['capacite'];
            $seance = new Seance($id_seance, $piscine, $activite, $dateheure, $professeur, $capacite, 1);
        }
        return $seance;
    }

    // TODO revoir comment stocker l'occupation pour une activité, puisque actuellement
    // un objet Seance n'a pas d'attribut "occupation"
    // Return all available sessions for a given activity, with occupation number
    function getSeancesDispo(Activite $activite) : array
    {
        $MySQLQuery = 'SELECT s.id_seance, s.id_piscine, s.id_activite,
        s.dateheure, s.professeur, s.capacite, COUNT(cs.id_seance) as occupation
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
            $piscine = $piscinePDO->getPiscine($row["id_piscine"]);
            $activitePDO = new ActivitePDO();
            $activitePDO->connection = new DBConnection();
            $activite = $activitePDO->getActivite($row["id_activite"]);
            $dateheure = $row['dateheure'];
            $professeur = $row['professeur'];
            $capacite = $row['capacite'];
            $seance = new Seance($id_seance, $piscine, $activite, $dateheure, $professeur, $capacite, 1);
            $seances[] = $seance;
        }
        return $seances;
    }
}