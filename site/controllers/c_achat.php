<?php

function achat()
{
    require_once('pdo/database.php');
    require_once('model/activity.php');
    require_once('pdo/activityPDO.php');
    require_once('model/situation.php');
    require_once('pdo/situationPDO.php');
    require_once('model/offer.php');
    require_once('pdo/offerPDO.php');
    require_once('model/code.php');
    require_once('pdo/codePDO.php');

    $step = filter_input(INPUT_GET, 'step', FILTER_SANITIZE_STRING);
    if (empty($step)) {
        $step = 'initial';
    }

    switch ($step) {
        case 'initial':
            $activityPDO = new ActivityPDO();
            $activities = $activityPDO->readAll();
            $situationPDO = new SituationPDO();
            $situations = $situationPDO->getSituations();
            require('view/v_achatInitial.php');
            break;
        case 'option':

            $activityPDO = new ActivityPDO();
            $activity = $activityPDO->read($_POST["activity"]);
            $situationPDO = new SituationPDO();
            $situation = $situationPDO->getSituation($_POST["situation"]);

            // Recherche en base des formules existantes pour ce couple "activite + situation"
            $optionPDO = new OfferPDO();
            $options = $optionPDO->readAll($activity, $situation);

            require('view/v_achatFormule.php');
            break;
        case 'final':
            $optionPDO = new OfferPDO();
            $option = $optionPDO->read($_POST["formule"]);
            // génération d'un nouveau code
            $codePDO = new CodePDO();
            $newCode = $codePDO->newCode($option);
            $codePDO->create($newCode);
            // récupération du nouveau code
            require('view/v_achatFinal.php');
            break;
    }
}
