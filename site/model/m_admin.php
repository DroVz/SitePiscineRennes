<?php
// Fusionner les 3 en une seule requète mais pour l'instant j'ai la flemme
function getInfoActivite(): array
{
    $conn = adminConnect();
    $MySQLQuery = 'SELECT * FROM activity';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $activite = $stmt->fetchAll();
    return $activite;
}

function getInfoSituation(): array
{
    $conn = adminConnect();
    $MySQLQuery = 'SELECT * FROM situation';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $activite = $stmt->fetchAll();
    return $activite;
}

function getInfoFormule(): array
{
    $conn = adminConnect();
    $MySQLQuery = 'SELECT * FROM offer';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $activite = $stmt->fetchAll();
    return $activite;
}


//Redondant avec Verifconnect dans m_verif

function adminConnect(): PDO
{
    try {
        $conn = new PDO(
            'mysql:host=localhost;dbname=pools;charset=utf8',
            'root',
            '',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return $conn;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
