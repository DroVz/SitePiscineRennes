<?php

require_once('pdo/database.php');
require_once('model/activite.php');

class ActivitePDO
{
    public DBConnection $connection;
    private array $data = array();

    // Return 1 activity from database
    public function read(int $id_activite): Activite
    {
        $MySQLQuery = 'SELECT * FROM activite WHERE id_activite = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$id_activite]);
        $activite = null;
        if (array_key_exists($id_activite, $this->data)) {
            $activite = $this->data[$id_activite];
        } else {
            $activite = $this->returnActivities($stmt->fetchAll())[0];
        }
        return $activite;
    }

    // Return all activities from database
    public function readAll(): array
    {
        $MySQLQuery = 'SELECT * FROM activite WHERE actif = 1';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute();
        return $this->returnActivities($stmt->fetchAll());
    }

    // TODO Add new activity to database
    public function create(): void
    {
    }

    // TODO Update existing activity
    public function update(): void
    {
    }

    // TODO Delete activity from database
    public function delete(): void
    {
    }

    // Return all activities in $rows and update $data
    private function returnActivities(array $rows): array
    {
        $activites = [];
        foreach ($rows as $row) {
            $id_activite = $row['id_activite'];
            $libelle = $row['libelle'];
            $description = $row['description'];
            $reservation = $row['reservation'];
            $actif = $row['actif'];
            $activite = new Activite($libelle, $description, $reservation, $actif, $id_activite);
            $activites[] = $activite;
            $this->data[$id_activite] = $activite;
        }
        return $activites;
    }
}
