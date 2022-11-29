<?php
    include_once('model/model.php');
    $conn = getConnection();
    
    $code = $_POST["code"];

    $infosCode = getInfosCode($conn, $code);

    require('v_infocode.php');