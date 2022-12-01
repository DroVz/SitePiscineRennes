<?php

// Return all options from formule database
function getFormules(int $activite, int $situation)  : array
{
    $conn = achatFormuleConnect();
    $MySQLQuery = 'SELECT * FROM formule f WHERE f.id_activite = ? AND f.id_situation = ? AND actif = 1;';
    // faire une requête préparée pour plus de sécurité même si pas de champ saisie de texte
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute([$activite, $situation]);
    $formules = $stmt->fetchAll();
    return $formules;
}

// Connection to database
function achatFormuleConnect() : PDO
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