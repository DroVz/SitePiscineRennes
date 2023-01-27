<?php
require_once('model/pool.php');
require_once('pdo/poolPDO.php');

function accueil()
{
    $poolPDO = new PoolPDO();
    $poolPDO->connection = new DBConnection();
    $pools = $poolPDO->readAll();
    $selectPool =  $pools[0];
    require('view/v_accueil.php');
}
