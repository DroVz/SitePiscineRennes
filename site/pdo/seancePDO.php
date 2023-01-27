<?php

require_once('pdo/database.php');
require_once('model/seance.php');

class SeancePDO
{
    public DBConnection $connection;
    private array $data = array();

    // Return 1 session from database
    public function read(int $id_seance): Seance
    {
        $MySQLQuery = 'SELECT * FROM seance WHERE id_seance = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$id_seance]);
        $session = null;
        if (array_key_exists($id_seance, $this->data)) {
            $session = $this->data[$id_seance];
        } else {
            $session = $this->returnSessions($stmt->fetchAll())[0];
        }
        return $session;
    }

    // Return all available sessions for a given activity
    public function readAll(Activite $activite): array
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
        return $this->returnSessions($stmt->fetchAll());
    }

    // TODO Add new session to database
    public function create(): void
    {
    }

    // TODO Update existing session
    public function update(): void
    {
    }

    // TODO Delete session from database
    public function delete(): void
    {
    }


    // TODO devrait vraiment être public ?
    public function getOccupation(Seance $seance): int
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

    // TODO devrait vraiment être public ?
    public function alreadyReserved(Code $code, Seance $seance): bool
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

    // Return all sessions in $rows and update $data
    private function returnSessions(array $rows): array
    {
        $sessions = [];
        foreach ($rows as $row) {
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
            $session = new Seance($piscine, $activite, $dateheure, $professeur, $capacite, 1, $id_seance);
            $sessions[] = $session;
            $this->data[$id_seance] = $session;
        }
        return $sessions;
    }
}
