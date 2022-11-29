<?php
    include_once('model/model.php');
    $conn = getConnection();

    // Appel au modèle pour interroger la base de données
    $activites = getActivites($conn);
    $situations = getSituations($conn);

    require('v_formule.php');