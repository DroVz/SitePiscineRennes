<?php
    require_once('model/m_accueil.php');

    function accueil() {
        $piscines = getInfoPiscines();
    
        require('view/v_accueil.php');
    }