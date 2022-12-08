<?php

// Generate a random 6-character string
function generateCode() : string
{
    $conn = achatConnect();
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
    $conn = achatConnect();
    $MySQLQuery = 'SELECT code FROM code';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $codes = $stmt->fetchAll();
    return $codes;
}

// Return true if generatedCode already exists in database
function alreadyExists(string $generatedCode) : bool
{
    $conn = achatConnect();
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
    $conn = achatConnect();
    $MySQLQuery = 'SELECT nb_entrees FROM formule WHERE id_formule = ?';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute([$numFormule]);
    $nbEntrees = $stmt->fetchAll();
    return $nbEntrees[0]['nb_entrees'];
}

// Add generatedCode to Code table
function addCode(int $numFormule, string $generatedCode)
{
    $conn = achatConnect();
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

// Return all options from formule database
function getFormules(int $activite, int $situation)  : array
{
    $conn = achatConnect();
    $MySQLQuery = 'SELECT * FROM formule f WHERE f.id_activite = ? AND f.id_situation = ? AND actif = 1;';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute([$activite, $situation]);
    $formules = $stmt->fetchAll();
    return $formules;
}

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