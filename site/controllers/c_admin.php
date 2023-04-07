<?php
require_once('pdo/database.php');

function getInfoActivity() : array
    {
        $conn = adminConnect();
        $MySQLQuery = 'SELECT * FROM activity';
        $stmt = $conn->prepare($MySQLQuery);
        $stmt->execute();
        $activity = $stmt->fetchAll();
        return $activity;
    }
    
    function getInfoSituation() : array
    {
        $conn = adminConnect();
        $MySQLQuery = 'SELECT * FROM situation';
        $stmt = $conn->prepare($MySQLQuery);
        $stmt->execute();
        $situation = $stmt->fetchAll();
        return $situation;
    }
    
    function getInfoPool() : array
    {
        $conn = adminConnect();
        $MySQLQuery = 'SELECT * FROM offer';
        $stmt = $conn->prepare($MySQLQuery);
        $stmt->execute();
        $pool = $stmt->fetchAll();
        return $pool;
    }
   
    function adminConnect() : PDO
    {
        try
        {
            $conn = new PDO('mysql:host=localhost;dbname=pools;charset=utf8', 'root', '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $conn;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
function gestion() {

        $activity = getInfoActivity();
        $situation = getInfoSituation();
        $pool = getInfoPool();
        
        require('view/v_admin.php');
    }

    
