<?php
require_once('model/piscine.php');
require_once('pdo/piscinePDO.php');

function accueil()
{
    $piscinePDO = new PiscinePDO();
    $piscinePDO->connection = new DBConnection();
    $piscines = $piscinePDO->readAll();
    require('view/v_accueil.php');
}
