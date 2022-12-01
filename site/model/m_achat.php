<?php

// Return all activities from database
function getActivites() : array
{
    $conn = achatConnect();
    $MySQLQuery = 'SELECT * FROM activite WHERE actif = 1';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $activites = $stmt->fetchAll();
	return $activites;
}

// Return all situations from database
function getSituations()  : array
{
    $conn = achatConnect();
    $MySQLQuery = 'SELECT * FROM situation WHERE actif = 1';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $situations = $stmt->fetchAll();
	return $situations;
}

// Connection to database
function achatConnect() : PDO
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