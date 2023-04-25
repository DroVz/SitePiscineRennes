<?php

class AdminAddSituation
{
    private $newSituation;

    function __construct()
    {
        $libelle = $_POST["situationname"];
        $active = isset($_POST["active"]) ? 1 : 0;
        $this->newSituation = new Situation($libelle, $active);
    }

    function printAddSituationResult()
    {
        $situationPDO = new SituationPDO();
        if ($situationPDO->create($this->newSituation)) {
            echo '<h1>Situation ajoutée</h1>';
        } else {
            echo '<p>Echec de l\'enregistrement</p>';
        }
    }
}
