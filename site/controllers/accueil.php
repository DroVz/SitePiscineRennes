<?php
    require_once('model/model.php');

    function accueil() {
        $conn = getConnection();

        // Appel au modèle pour interroger la base de données
        $piscines = getPiscines($conn);
    
        require('templates/v_accueil.php');
    } 
    