<?php
    require_once('model/model.php');

    function nouveaucode() {
        $conn = getConnection();

        $activite = $_POST["activite"];
        $situation = $_POST["situation"];
        
        // Recherche en base des formules existantes pour ces activite + situation
        $formules = getFormules($conn, $activite, $situation);
        
        require('templates/v_nouveaucode.php');
    }