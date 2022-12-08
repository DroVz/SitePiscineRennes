<?php

function achat() {
    require_once('model/m_achat.php');

    $step = filter_input(INPUT_GET, 'step', FILTER_SANITIZE_STRING);
    if (empty($step)) {
        $step = 'initial';
    }

    switch($step) {
        case 'initial' :
            $activites = getActivites();
            $situations = getSituations();
            require('view/v_achatInitial.php');
            break;
        case 'formule' :
            $id_activite = $_POST["activite"];
            $id_situation = $_POST["situation"];        
            // Recherche en base des formules existantes pour ce couple "activite + situation"
            $formules = getFormules($id_activite, $id_situation);
            require('view/v_achatFormule.php');
            break;
        case 'final' :
            $formule = $_POST["formule"];    
            // appel à fonction pour
            // 1. générer un code
            // 2. boucler tant que le code n'est pas nouveau (fonction doit rechercher les codes existants)
            $generatedCode = "";
            while ($generatedCode == null || alreadyExists($generatedCode)) {
                $generatedCode = generateCode();
            };        
            // 3. une fois qu'on a un code qui n'existe pas déjà, faire un update de la base
            addCode($formule, $generatedCode);        
            // 4. donner le code à l'utilisateur (c'est la vue qui s'en occupe)
            require('view/v_achatFinal.php');
            break;
    }
}