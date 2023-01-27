<?php
function verif()
{
    require_once('model/session.php');
    require_once('pdo/sessionPDO.php');
    require_once('model/booking.php');
    require_once('pdo/bookingPDO.php');
    require_once('model/code.php');
    require_once('pdo/codePDO.php');
    require_once('model/activity.php');
    require_once('pdo/activityPDO.php');

    $step = filter_input(INPUT_GET, 'step', FILTER_SANITIZE_STRING);
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
        case 'booking':
            // Récupération du numéro du code dans la base depuis le formulaire précédent
            // Récupération du code de l'activité
            $id_code = $_POST['id_code'];

            $id_activity = $_POST['id_activity'];
            $nbEntries = $_POST['nb_entries'];

            // On récupère les infos du code
            $codePDO = new CodePDO();
            $codePDO->connection = new DBConnection();
            $code = $codePDO->read($id_code);

            // On récupère les infos de l'activité
            $activityPDO = new ActivityPDO();
            $activityPDO->connection = new DBConnection();
            $activity = $activityPDO->read($id_activity);

            // On récupère les réservations existantes pour le code
            $bookingPDO = new BookingPDO();
            $bookingPDO->connection = new DBConnection();
            $bookings = $bookingPDO->readAll($code);
            $remainingBookings = $nbEntries - count($bookings);

            // On a besoin des infos des piscines
            $poolPDO = new PoolPDO();
            $poolPDO->connection = new DBConnection();
            $pools = $poolPDO->readAll();

            // On veut aussi connaître toutes les séances disponibles pour l'activité choisie
            $sessionPDO = new SessionPDO();
            $sessionPDO->connection = new DBConnection();
            $availableSessions = $sessionPDO->readAll($activity);

            require('view/v_verifReservation.php');
            break;
    }
}
