<?php

function achat() {
    require_once('pdo/database.php');
    require_once('model/activite.php');
    require_once('pdo/activitePDO.php');
    require_once('model/situation.php');
    require_once('pdo/situationPDO.php');
    require_once('model/formule.php');
    require_once('pdo/formulePDO.php');
    require_once('model/code.php');
    require_once('pdo/codePDO.php');

    $step = filter_input(INPUT_GET, 'step', FILTER_SANITIZE_STRING);
    if (empty($step)) {
        $step = 'initial';
    }

    switch($step) {
        case 'initial':
            $activitePDO = new ActivitePDO();
            $activitePDO->connection = new DBConnection();
            $activites = $activitePDO->getActivites();
            $situationPDO = new SituationPDO();
            $situationPDO->connection = new DBConnection();
            $situations = $situationPDO->getSituations();
            require('view/v_achatInitial.php');
            break;
        case 'formule':
            $activitePDO = new ActivitePDO();
            $activitePDO->connection = new DBConnection();
            $activite = $activitePDO->getActivite($_POST["activite"]);
            $situationPDO = new SituationPDO();
            $situationPDO->connection = new DBConnection();
            $situation = $situationPDO->getSituation($_POST["situation"]);  
            // Recherche en base des formules existantes pour ce couple "activite + situation"
            $formulePDO = new FormulePDO();
            $formulePDO->connection = new DBConnection();
            $formules = $formulePDO->getFormules($activite, $situation);
            require('view/v_achatFormule.php');
            break;
        case 'final' :
            $formulePDO = new FormulePDO();
            $formulePDO->connection = new DBConnection();
            $formule = $formulePDO->getFormule($_POST["formule"]);
            // génération d'un nouveau code
            $codePDO = new CodePDO();
            $codePDO->connection = new DBConnection();
            $str_code = $codePDO->newCode($formule);
            // entrée du code dans la base
            $codePDO->addCode($formule, $str_code);
            // récupération du nouveau code
            require('view/v_achatFinal.php');
            break;
    }
}