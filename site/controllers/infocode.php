<?php
    require_once('model/model.php');

    function infocode() {
        $conn = getConnection();
    
        $code = $_POST["code"];
    
        $infosCode = getInfosCode($conn, $code);
    
        require('view/v_infocode.php');
    }   