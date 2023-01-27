<?php

require_once('pdo/database.php');
require_once('pdo/activitePDO.php');
require_once('pdo/situationPDO.php');
require_once('model/formule.php');

class FormulePDO {
    public DBConnection $connection;

    // Return 1 option from formule database
    public function getFormule(int $id_formule) : Formule
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM formule f WHERE f.id_formule = ?;');
        $stmt->execute([$id_formule]);
        while (($row = $stmt->fetch())) {
            $id_formule = $row['id_formule'];
            $activitePDO = new ActivitePDO();
            $activitePDO->connection = new DBConnection();
            $activite = $activitePDO->getActivite($row["id_activite"]);
            $situationPDO = new SituationPDO();
            $situationPDO->connection = new DBConnection();
            $situation = $situationPDO->getSituation($row["id_situation"]);
            $nb_entrees = $row['nb_entrees'];
            $nb_personnes = $row['nb_personnes'];
            $duree_validite = $row['duree_validite'];
            $prix = $row['prix'];
            $actif = $row['actif'];
            $formule = new Formule($id_formule, $activite, $situation, $nb_entrees,
            $nb_personnes, $duree_validite, $prix, $actif);
        }
        return $formule;
    }

    // Return all options from formule database
    public function getFormules(Activite $activite, Situation $situation)  : array
    {
        $stmt = $this->connection->getConnection()->prepare('SELECT * FROM formule 
         WHERE id_activite = ? AND id_situation = ? AND actif = 1;');
        $stmt->execute([$activite->getId_activite(), $situation->getId_situation()]);
        $formules = [];
        while (($row = $stmt->fetch())) {
            $id_formule = $row['id_formule'];
            $nb_entrees = $row['nb_entrees'];
            $nb_personnes = $row['nb_personnes'];
            $duree_validite = $row['duree_validite'];
            $prix = $row['prix'];
            $actif = $row['actif'];
            $formule = new Formule($id_formule, $activite, $situation, $nb_entrees,
            $nb_personnes, $duree_validite, $prix, $actif);
            $formules[] = $formule;
        }
        return $formules;
    }
}