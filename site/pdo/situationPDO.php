<?php

require_once('pdo/database.php');
require_once('model/situation.php');

class SituationPDO
{
    public DBConnection $connection;
    private array $data = array();

    // Return 1 situation from database
    public function getSituation(int $id_situation): Situation
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM situation WHERE id_situation = ?');
        $stmt->execute([$id_situation]);
        $situation = null;
        if (array_key_exists($id_situation, $this->data)) {
            $situation = $this->data[$id_situation];
        } else {
            $situation = $this->returnSituations($stmt->fetchAll())[0];
        }
        return $situation;
    }

    // Return all situations from database
    public function getSituations(): array
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM situation WHERE actif = 1;');
        $stmt->execute();
        return $this->returnSituations($stmt->fetchAll());
    }

    // Return all situations in $rows and update $data
    private function returnSituations(array $rows): array
    {
        $situations = [];
        foreach ($rows as $row) {
            $id_situation = $row['id_situation'];
            $libelle = $row['libelle'];
            $actif = $row['actif'];
            $situation = new Situation($libelle, $actif, $id_situation);
            $situations[] = $situation;
            $this->data[$id_situation] = $situation;
        }
        return $situations;
    }
}
