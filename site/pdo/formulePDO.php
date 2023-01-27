<?php

require_once('pdo/database.php');
require_once('pdo/activitePDO.php');
require_once('pdo/situationPDO.php');
require_once('model/formule.php');

class FormulePDO
{
    public DBConnection $connection;
    private array $data = array();

    // Return 1 option from formule database
    public function read(int $id_formule): Formule
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM formule f WHERE f.id_formule = ?;');
        $stmt->execute([$id_formule]);
        $option = null;
        if (array_key_exists($id_formule, $this->data)) {
            $option = $this->data[$id_formule];
        } else {
            $option = $this->returnOptions($stmt->fetchAll())[0];
        }
        return $option;
    }

    // Return all options from formule database
    public function readAll(Activite $activite, Situation $situation): array
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM formule 
         WHERE id_activite = ? AND id_situation = ? AND actif = 1;');
        $stmt->execute([$activite->getId_activite(), $situation->getId_situation()]);
        return $this->returnOptions($stmt->fetchAll());
    }

    // TODO Add new option to database
    public function create(): void
    {
    }

    // TODO Update existing option
    public function update(): void
    {
    }

    // TODO Delete option from database
    public function delete(): void
    {
    }

    // Return all options in $rows and update $data
    private function returnOptions(array $rows): array
    {
        $options = [];
        foreach ($rows as $row) {
            $id_formule = $row['id_formule'];
            $activitePDO = new ActivitePDO();
            $activitePDO->connection = new DBConnection();
            $activite = $activitePDO->read($row["id_activite"]);
            $situationPDO = new SituationPDO();
            $situationPDO->connection = new DBConnection();
            $situation = $situationPDO->getSituation($row["id_situation"]);
            $nb_entrees = $row['nb_entrees'];
            $nb_personnes = $row['nb_personnes'];
            $duree_validite = $row['duree_validite'];
            $prix = $row['prix'];
            $actif = $row['actif'];
            $option = new Formule(
                $activite,
                $situation,
                $nb_entrees,
                $nb_personnes,
                $duree_validite,
                $prix,
                $actif,
                $id_formule
            );
            $options[] = $option;
            $this->data[$id_formule] = $option;
        }
        return $options;
    }
}
