<?php
require_once('c_admin.php');
require_once('c_CodeInformation.php');
require_once('controllers/c_CodeController.php');

require_once('./pdo/codePDO.php');

class Redirection
{

    private static ?Redirection $ControllerRedirection = null;

    public static function getInstance(): Redirection
    {
        if (Redirection::$ControllerRedirection === null) {
            try {
                Redirection::$ControllerRedirection = new Redirection();
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return Redirection::$ControllerRedirection;
    }
    private function __construct()
    {
    }

    public function codeRedirection()
    {
        // Création des controllers model 
        $codeController = new CodeController;

        $step = 'initial';
        if (isset($_GET['step'])) {
            $step = htmlspecialchars($_GET['step']);
        }

        switch ($step) {
            case 'initial':
                // TODO hmm, mais ce fichier vue n'existe plus ?
                require('view/v_verif.php');
                break;

            case 'info':
                // Regarde si le code existe et oriente la redirection en fonction 
                if ($codeController->tryToGetCode() != null) {
                    require('view/v_CodeInformation.php');
                } else {
                    require('view/v_CodeVerification.php');
                }
                break;

            case 'booking':
                // TODO : Faire un singleton de la connexion à la bd 
                // Récupération du numéro du code dans la base depuis le formulaire précédent
                // Récupération du code de l'activité
                $id_code = $_POST['id_code'];

                $id_activity = $_POST['id_activity'];
                $nbEntries = $_POST['nb_entries'];

                // On récupère les infos du code
                $codePDO = new CodePDO();
                $code = $codePDO->read($id_code);

                // On récupère les infos de l'activité
                $activityPDO = new ActivityPDO();
                $activity = $activityPDO->read($id_activity);

                // On récupère les réservations existantes pour le code
                $bookingPDO = new BookingPDO();
                $bookings = $bookingPDO->readAll($code);
                $remainingBookings = $nbEntries - count($bookings);

                // On a besoin des infos des piscines
                $poolPDO = new PoolPDO();
                $pools = $poolPDO->readAll();

                // On veut aussi connaître toutes les séances disponibles pour l'activité choisie
                $lessonPDO = new LessonPDO();
                $availableSessions = $lessonPDO->readAll($activity);

                require('view/v_verifReservation.php');
                break;
        }
    }

    public function achatRedirection()
    {
        $step = 'initial';
        if (isset($_GET['step'])) {
            $step = htmlspecialchars($_GET['step']);
        }

        switch ($step) {
            case 'initial':
                require('view/v_ChoixActivite.php');
                break;
            case 'offer':
                require('view/v_ChoixFormule.php');
                break;
        }
    }

    public function panierRedirection()
    {
        $step = 'view';
        if (isset($_GET['step'])) {
            $step = htmlspecialchars($_GET['step']);
        }

        switch ($step) {
            case 'view':
                require('view/v_PanierVue.php');
                break;
            case 'add':
                require('view/v_PanierAjout.php');
                break;
            case 'remove':
                require('view/v_PanierSuppression.php');
                break;
            case 'payment':
                // TODO
                // VIEILLES LIGNES POUR CREATION DE CODE, A REUTILISER AU MOMENT DU PAIEMENT
                /*
                    $optionPDO = new OfferPDO();
                    $option = $optionPDO->read($_POST["formule"]);
                    // génération d'un nouveau code
                    $codePDO = new CodePDO();
                    $newCode = $codePDO->newCode($option);
                    $codePDO->create($newCode);
                    // récupération du nouveau code
                    require('view/v_achatFinal.php');
                    break;
                */
        }
    }
}
