<?php

require_once('pdo/database.php');
require_once('model/piscine.php');

class PiscinePDO {
    public DBConnection $connection;

    // Return 1 pool from database
    public function getPiscine(int $id_piscine) : Piscine
    {
        $MySQLQuery = 'SELECT * FROM piscine WHERE id_piscine = ?;';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute([$id_piscine]);
        while (($row = $stmt->fetch())) {
            $id_piscine = $row['id_piscine'];
            $nom = $row['nom'];
            $adresse = $row['adresse'];
            $actif = $row['actif'];
            $piscine = new Piscine($id_piscine, $nom, $adresse, $actif);
        }
        return $piscine;
    }

    // Return all pools from database
    public function getPiscines() : array
    {
        $MySQLQuery = 'SELECT * FROM piscine';
        $stmt = $this->connection->getConnection()->prepare($MySQLQuery);
        $stmt->execute();
    
        $piscines = [];
        while (($row = $stmt->fetch())) {
            $id_piscine = $row['id_piscine'];
            $nom = $row['nom'];
            $adresse = $row['adresse'];
            $actif = $row['actif'];
            $piscine = new Piscine($id_piscine, $nom, $adresse, $actif);
            $piscines[] = $piscine;
        }
        return $piscines;
    }
}