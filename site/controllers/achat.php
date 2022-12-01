<?php
    require_once('model/model.php');
    require_once('model/m_achat.php');

    function achat() {
        // Appel au modèle pour interroger la base de données
        $activites = getActivites();
        $situations = getSituations();
    
        require('view/v_achat.php');
    }