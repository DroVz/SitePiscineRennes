<?php
    require_once('model/m_verifInfo.php');

    function verifInfo() {   
        $code = $_POST["code"];    
        $infosCode = getInfosCode($code);    
        require('view/v_verifInfo.php');
    }   