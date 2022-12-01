<?php
    require_once('model/model.php');

    function reservation() {   
        $conn = getConnection();
        // Récupération du numéro du code dans la base depuis le formulaire précédent
        // Récuparation du code de l'activité
        $id_code = $_POST['id_code'];
        $id_activite = $_POST['id_activite'];
        $nb_entrees = $_POST['nb_entrees'];

        // On récupère les réservations existantes pour le code
        $reservations = getReservations($conn, $id_code);
        $reservationsRestantes = $nb_entrees - count($reservations);

        // On a besoin des infos des piscines
        $piscines = getPiscines($conn);

        // On veut aussi connaître toutes les séances disponibles pour l'activité choisie
        $seancesDispo = getSeancesDispo($conn, $id_activite);

        require('view/v_reservation.php');
}