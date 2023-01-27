<?php
    require_once('model/m_admin.php');

    function gestion() {
        $activite = getInfoActivite();
        $situation = getInfoSituation();
        $formule = getInfoFormule();
        
        require('view/v_admin.php');
    }