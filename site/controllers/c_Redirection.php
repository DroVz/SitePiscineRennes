<?php
   require_once('pdo/database.php');
   require_once('model/session.php');
   require_once('pdo/sessionPDO.php');
   require_once('model/booking.php');
   require_once('pdo/bookingPDO.php');
   require_once('model/code.php');
   require_once('pdo/codePDO.php');
   require_once('model/activity.php');
   require_once('pdo/activityPDO.php');
   require_once('model/pool.php');
   require_once('pdo/poolPDO.php');
   require_once('model/situation.php');
   require_once('pdo/situationPDO.php');
   require_once('model/offer.php');
   require_once('pdo/offerPDO.php');

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$ControllerRedirection = new Redirection();

if(empty($action)) {
	$action = 'accueil';
}

// Navigation Barre Actions 
switch($action) {
    case 'codeRedirection';


}

class Redirection {

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

    public function codeRedirection(){

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
                $userInput = $_POST["code"];

                $codePDO = new CodePDO();
                $idCode = $codePDO->getId($userInput);

                if ($idCode != null) {
                    require('view/v_CodeInformation.php');
                } else{
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
                $sessionPDO = new SessionPDO();
                $availableSessions = $sessionPDO->readAll($activity);
    
                require('view/v_verifReservation.php');
                break;
            }
        }
        
    public function achatRedirection(){

        $step = filter_input(INPUT_GET, 'step', FILTER_SANITIZE_STRING);

        if (empty($step)) {
            $step = 'initial';
        }

        switch ($step) {
            case 'initial':
                $activityPDO = new ActivityPDO();
                $activities = $activityPDO->readAll();
                $situationPDO = new SituationPDO();
                $situations = $situationPDO->getSituations();
                require('view/v_achatInitial.php');
                break;
            case 'option':

                $activityPDO = new ActivityPDO();
                $activity = $activityPDO->read($_POST["activity"]);
                $situationPDO = new SituationPDO();
                $situation = $situationPDO->getSituation($_POST["situation"]);

                // Recherche en base des formules existantes pour ce couple "activite + situation"
                $optionPDO = new OfferPDO();
                $options = $optionPDO->readAll($activity, $situation);

                require('view/v_achatFormule.php');
                break;
            case 'final':
                $optionPDO = new OfferPDO();
                $option = $optionPDO->read($_POST["formule"]);
                // génération d'un nouveau code
                $codePDO = new CodePDO();
                $newCode = $codePDO->newCode($option);
                $codePDO->create($newCode);
                // récupération du nouveau code
                require('view/v_achatFinal.php');
                break;
        }
    }
}