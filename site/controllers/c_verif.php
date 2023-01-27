<?php
function verif()
{
    require_once('model/seance.php');
    require_once('pdo/seancePDO.php');
    require_once('model/reservation.php');
    require_once('pdo/reservationPDO.php');
    require_once('model/code.php');
    require_once('pdo/codePDO.php');
    require_once('model/activite.php');
    require_once('pdo/activitePDO.php');

    $step = filter_input(INPUT_GET, 'step',FILTER_SANITIZE_STRING);
    if (empty($step)) {
        $step = 'initial';
    }

    switch ($step) {
        case 'initial':
            require('view/v_verif.php');
            break;
        case 'info':
            // TODO ajouter une sécurité à la ligne ci-dessous
            $str_code = $_POST["code"];
            $codePDO = new CodePDO();
            $codePDO->connection = new DBConnection();
            $id_code = $codePDO->getId($str_code);
            if ($id_code == 0) {
                $code = null;
            } else {
                $code = $codePDO->read($id_code);
            }
            require('view/v_verifInfo.php');
            break;
        case 'reservation':
            // Récupération du numéro du code dans la base depuis le formulaire précédent
            // Récupération du code de l'activité
            $id_code = $_POST['id_code'];
            $id_activite = $_POST['id_activite'];
            $nb_entrees = $_POST['nb_entrees'];

            // On récupère les infos du code
            $codePDO = new CodePDO();
            $codePDO->connection = new DBConnection();
            $code = $codePDO->read($id_code);

            // On récupère les infos de l'activité
            $activitePDO = new ActivitePDO();
            $activitePDO->connection = new DBConnection();
            $activite = $activitePDO->read($id_activite);

            // On récupère les réservations existantes pour le code
            $reservationPDO = new ReservationPDO();
            $reservationPDO->connection = new DBConnection();
            $reservations = $reservationPDO->readAll($code);
            $reservationsRestantes = $nb_entrees - count($reservations);

            // On a besoin des infos des piscines
            $piscinePDO = new PiscinePDO();
            $piscinePDO->connection = new DBConnection();
            $piscines = $piscinePDO->readAll();

            // On veut aussi connaître toutes les séances disponibles pour l'activité choisie
            $seancePDO = new SeancePDO();
            $seancePDO->connection = new DBConnection();
            $seancesDispo = $seancePDO->readAll($activite);

            require('view/v_verifReservation.php');
            break;
    }
}
