<?php

// Connection to database
function getConnection() : PDO
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

// Generate a random 6-character string
function generateCode() : string
{
    $chars = ['1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G',
    'H','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $code = "";
    for($i = 0; $i<6; $i++) {
        $code = $code . $chars[rand(0, count($chars)-1)];
    }
    return $code;
}

// Return all activities from database
function getActivites(PDO $conn) {
    $MySQLQuery = 'SELECT * FROM activite WHERE actif = 1';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $activites = $stmt->fetchAll();
	return $activites;
}

// Return all situations from database
function getSituations(PDO $conn) {
    $MySQLQuery = 'SELECT * FROM situation WHERE actif = 1';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $situations = $stmt->fetchAll();
	return $situations;
}

// Return all offers from database
function getFormules(PDO $conn, int $activite, int $situation) {
    $MySQLQuery = 'SELECT * FROM formule f WHERE f.id_activite = ? AND f.id_situation = ? AND actif = 1;';
    // faire une requête préparée pour plus de sécurité même si pas de champ saisie de texte
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute([$activite, $situation]);
    $formules = $stmt->fetchAll();
    return $formules;
}

// Return all existing codes from database
function getExistingCodes(PDO $conn) {
    $MySQLQuery = 'SELECT code FROM code';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $codes = $stmt->fetchAll();
    return $codes;
}

// Return true if generatedCode already exists in database
function alreadyExists(PDO $conn, string $generatedCode) {
    foreach (getExistingCodes($conn) as $existingCode) {
        if ($existingCode['code'] == $generatedCode) {
            return true;
        }
    }
    return false;
}

// Return nb_entrees for a given formule
function getNbEntrees(PDO $conn, int $numFormule) {
    $MySQLQuery = 'SELECT nb_entrees FROM formule WHERE id_formule = ?';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute([$numFormule]);
    $nbEntrees = $stmt->fetchAll();
    return $nbEntrees[0]['nb_entrees'];
}

// Add generatedCode to Code table
function addCode(PDO $conn, int $numFormule, string $generatedCode) {
    $today = date('Y-m-d H:i:s');
    $nbEntreesRestantes = getNbEntrees($conn, $numFormule);
    $MySQLQuery = 'INSERT INTO code(id_formule, date_generation, code, entrees_restantes)
    VALUES (?, ?, ?, ?)';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->bindParam(1, $numFormule);
    $stmt->bindParam(2, $today);
    $stmt->bindParam(3, $generatedCode);
    $stmt->bindParam(4, $nbEntreesRestantes);
    $stmt->execute();
}

// Return data concerning a given code
function getInfosCode(PDO $conn, string $code) {
    $MySQLQuery = 'SELECT c.id_code, c.date_generation, c.code, c.entrees_restantes,
                    f.id_activite, f.nb_entrees, f.nb_personnes, f.duree_validite,
                    a.libelle AS libelle_activite, a.description as description_activite,
                    a.reservation, s.libelle AS libelle_situation
                    FROM code c
                        JOIN formule f ON (c.id_formule = f.id_formule)
                        JOIN activite a ON (f.id_activite = a.id_activite)
                        JOIN situation s ON (f.id_situation = s.id_situation)
                    WHERE c.code = ?;';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute([$code]);
    $infosCode = $stmt->fetchAll();
    return $infosCode;
}