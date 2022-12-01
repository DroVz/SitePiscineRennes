<?php
    require_once('model/m_accueil.php');

    function accueil() {
        // Appel au modèle pour interroger la base de données
        $piscines = getInfoPiscines();
    
        require('view/v_accueil.php');
    } 
    