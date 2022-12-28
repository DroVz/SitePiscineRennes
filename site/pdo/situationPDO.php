<?php

require_once('pdo/database.php');
require_once('model/situation.php');

class SituationPDO {
    public DBConnection $connection;

    // Return 1 situation from database
    public function getSituation(int $id_situation) : Situation
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM situation WHERE id_situation = ?');
        $stmt->execute([$id_situation]);
        while (($row = $stmt->fetch())) {
            $id_situation = $row['id_situation'];
            $libelle = $row['libelle'];
            $actif = $row['actif'];
            $situation = new Situation($id_situation, $libelle, $actif);
        }
        return $situation;
    }

    // Return all situations from database
    public function getSituations()  : array
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM situation WHERE actif = 1;');
        $stmt->execute();
        $situations = [];
        while (($row = $stmt->fetch())) {
            $id_situation = $row['id_situation'];
            $libelle = $row['libelle'];
            $actif = $row['actif'];
            $situation = new Situation($id_situation, $libelle, $actif);
            $situations[] = $situation;
        }
        return $situations;
    }
}