<?php

require_once('pdo/database.php');
require_once('model/situation.php');

class SituationPDO
{
    public DBConnection $connection;
    private array $donnees = array();

    // Return 1 situation from database
    public function getSituation(int $id_situation): Situation
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM situation WHERE id_situation = ?');
        $stmt->execute([$id_situation]);
        $situation = null;
        if (array_key_exists($id_situation, $this->donnees)) {
            $situation = $this->donnees[$id_situation];
        } else {
            while (($row = $stmt->fetch())) {
                $id_situation = $row['id_situation'];
                $libelle = $row['libelle'];
                $actif = $row['actif'];
                $situation = new Situation($libelle, $actif, $id_situation);
                $this->donnees[$id_situation] = $situation;
            }
        }
        return $situation;
    }

    // Return all situations from database
    public function getSituations(): array
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM situation WHERE actif = 1;');
        $stmt->execute();
        $situations = [];
        while (($row = $stmt->fetch())) {
            $id_situation = $row['id_situation'];
            $libelle = $row['libelle'];
            $actif = $row['actif'];
            $situation = new Situation($libelle, $actif, $id_situation);
            $situations[] = $situation;
        }
        return $situations;
    }
}
