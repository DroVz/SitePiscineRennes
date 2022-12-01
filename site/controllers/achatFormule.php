<?php
    require_once('model/model.php');
    require_once('model/m_achatFormule.php');

    function achatFormule() {
        $id_activite = $_POST["activite"];
        $id_situation = $_POST["situation"];
        
        // Recherche en base des formules existantes pour ce couple "activite + situation"
        $formules = getFormules($id_activite, $id_situation);
        
        require('view/v_achatFormule.php');
    }