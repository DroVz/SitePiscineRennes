<?php

// Return information from pools
function getInfoPiscines() : array
{
    $conn = accueilConnect();
    $MySQLQuery = 'SELECT * FROM piscine';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $piscines = $stmt->fetchAll();
    return $piscines;
}

// Connection to database
function accueilConnect() : PDO
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