<?php

// Return data concerning a given code
function getInfosCode(string $code) : array
{
    $conn = verifInfoConnect();
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

// Connection to database
function verifInfoConnect() : PDO
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