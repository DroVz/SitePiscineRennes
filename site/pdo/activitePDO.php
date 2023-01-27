<?php

require_once('pdo/database.php');
require_once('model/activite.php');

class ActivitePDO {
    public DBConnection $connection;

    // Return 1 activity from database
    public function getActivite(int $id_activite) : Activite
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM activite WHERE id_activite = ?;');
        $stmt->execute([$id_activite]);        
        while (($row = $stmt->fetch())) {
            $id_activite = $row['id_activite'];
            $libelle = $row['libelle'];
            $description = $row['description'];
            $reservation = $row['reservation'];
            $actif = $row['actif'];
            $activite = new Activite($id_activite, $libelle, $description, $reservation, $actif);
        }
        return $activite;
    }

    // Return all activities from database
    public function getActivites() : array
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM activite WHERE actif = 1');
        $stmt->execute();    
        $activites = [];
        while (($row = $stmt->fetch())) {
            $id_activite = $row['id_activite'];
            $libelle = $row['libelle'];
            $description = $row['description'];
            $reservation = $row['reservation'];
            $actif = $row['actif'];
            $activite = new Activite($id_activite, $libelle, $description, $reservation, $actif);
            $activites[] = $activite;
        }
        return $activites;
    }
}