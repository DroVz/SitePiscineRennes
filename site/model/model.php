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



// Return data concerning a given code
function getInfosCode(PDO $conn, string $code) : array
{
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

// Return all reservations associated with a given code
function getReservations(PDO $conn, int $id_code) : array
{
    $MySQLQuery = 'SELECT cs.id_code, cs.date_reservation, s.id_seance, s.dateheure,
    s.professeur, p.nom FROM code_seance cs
    LEFT JOIN seance s ON (cs.id_seance = s.id_seance)
    JOIN piscine p ON (s.id_piscine = p.id_piscine)
    WHERE id_code = ?';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute([$id_code]);
    $reservations = $stmt->fetchAll();
    return $reservations;
}

// Return all available sessions for a given activity, with occupation number
function getSeancesDispo(PDO $conn, int $id_activite) : array
{
    $MySQLQuery = 'SELECT s.id_seance, s.id_piscine, p.nom, s.id_activite, a.libelle,
    s.dateheure, s.professeur, s.capacite, COUNT(cs.id_seance) as occupation
    FROM seance s
    JOIN piscine p ON (s.id_piscine = p.id_piscine)
    JOIN activite a ON (s.id_activite = a.id_activite)
    LEFT JOIN code_seance cs ON (s.id_seance = cs.id_seance)
    WHERE s.id_activite = ? AND s.actif = 1
    GROUP BY s.id_seance
    ORDER BY s.id_piscine';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute([$id_activite]);
    $seances = $stmt->fetchAll();
    return $seances;
}

// Return information from pools
function getPiscines(PDO $conn) : array
{
    $MySQLQuery = 'SELECT * FROM piscine';
    $stmt = $conn->prepare($MySQLQuery);
    $stmt->execute();
    $piscines = $stmt->fetchAll();
    return $piscines;
}

function isPickedSeance(int $id_seance, array $reservations) : bool
{
    $seances_reservees = [];
    foreach($reservations as $reservation) {
        $seances_reservees[] = $reservation['id_seance'];
        //array_push($seances_reservees, $reservation['id_seance']);  // Autre méthode possible        
    }
    if(in_array($id_seance, $seances_reservees)) {
        return true;
    }
    return false;
}