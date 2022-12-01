<?php

// Generate a random 6-character string
function generateCode() : string
{
    $conn = achatResultConnect();
    $chars = ['1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G',
    'H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $code = "";
    for($i = 0; $i<6; $i++) {
        $code = $code . $chars[rand(0, count($chars)-1)];
    }
    return $code;
}

// Return all existing codes from database
function getExistingCodes()  : array
{
    $conn = achatResultConnect();
    $MySQLQuery = 'SELECT code FROM code';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $codes = $stmt->fetchAll();
    return $codes;
}

// Return true if generatedCode already exists in database
function alreadyExists(string $generatedCode) : bool
{
    $conn = achatResultConnect();
    foreach (getExistingCodes() as $existingCode) {
        if ($existingCode['code'] == $generatedCode) {
            return true;
        }
    }
    return false;
}

// Return nb_entrees for a given formule
function getNbEntrees(int $numFormule) : int
{
    $conn = achatResultConnect();
    $MySQLQuery = 'SELECT nb_entrees FROM formule WHERE id_formule = ?';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute([$numFormule]);
    $nbEntrees = $stmt->fetchAll();
    return $nbEntrees[0]['nb_entrees'];
}

// Add generatedCode to Code table
function addCode(int $numFormule, string $generatedCode)
{
    $conn = achatResultConnect();
    $today = date('Y-m-d H:i:s');
    $nbEntreesRestantes = getNbEntrees($numFormule);
    $MySQLQuery = 'INSERT INTO code (id_formule, date_generation, code, entrees_restantes)
    VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->bindParam(1, $numFormule);
    $stmt->bindParam(2, $today);
    $stmt->bindParam(3, $generatedCode);
    $stmt->bindParam(4, $nbEntreesRestantes);
    $stmt->execute();
}

// Connection to database
function achatResultConnect() : PDO
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