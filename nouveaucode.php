<?php
    include_once('model/model.php');
    $conn = getConnection();

    $activite = $_POST["activite"];
    $situation = $_POST["situation"];
    
    $formules = getFormules($conn, $activite, $situation);

    // Recherche en base des formules existantes pour ces activite + situation

    require('v_nouveaucode.php');


    //  The closing php '?\>' tag MUST be omitted from files containing only PHP.