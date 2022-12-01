<?php
    require_once('model/model.php');

    function formule() {
        $conn = getConnection();

        // Appel au modèle pour interroger la base de données
        $activites = getActivites($conn);
        $situations = getSituations($conn);
    
        require('templates/v_formule.php');
    }