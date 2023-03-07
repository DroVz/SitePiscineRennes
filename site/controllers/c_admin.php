<?php
require_once('pdo/database.php');

function getInfoActivite() : array
    {
        $conn = adminConnect();
        $MySQLQuery = 'SELECT * FROM activite';
        $stmt = $conn->prepare($MySQLQuery);
        $stmt->execute();
        $activite = $stmt->fetchAll();
        return $activite;
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
    
    function getInfoFormule() : array
    {
        $conn = adminConnect();
        $MySQLQuery = 'SELECT * FROM formule';
        $stmt = $conn->prepare($MySQLQuery);
        $stmt->execute();
        $activite = $stmt->fetchAll();
        return $activite;
    }
   
    function adminConnect() : PDO
    {
        try
        {
            $conn = new PDO('mysql:host=localhost;dbname=piscines;charset=utf8', 'root', '',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $conn;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
function gestion() {

        $activite = getInfoActivite();
        $situation = getInfoSituation();
        $formule = getInfoFormule();
        
        require('view/v_admin.php');
    }

    