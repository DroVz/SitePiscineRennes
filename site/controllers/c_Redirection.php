<?php
require_once('admin/c_admin.php');
require_once('c_CodeInformation.php');
require_once('controllers/c_CodeController.php');
require_once('controllers/admin/c_AdminController.php');
require_once('controllers/c_BookingController.php');

// a cause de booking dans codeRedirection 
require_once('./pdo/activityPDO.php');
require_once('./pdo/bookingPDO.php');
require_once('./pdo/poolPDO.php');
require_once('./pdo/codePDO.php');
require_once('./pdo/lessonPDO.php');

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
            case 'info':
                // Regarde si le code existe et oriente la redirection en fonction 
                if ($codeController->tryToGetCode() != null) {
                    require('view/v_CodeInformation.php');
                } else {
                    require('view/v_CodeVerification.php');
                }
                break;
            case 'booking':
                require('view/v_VerifReservation.php');
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
                require('view/v_Paiement.php');
                break;
            case 'paymentDone':
                require('view/v_CodeObtention.php');
                break;
        }
    }

    public function adminRedirection()
    {
        $adminController = new AdminController;
        $step = 'view';
        if (isset($_GET['step'])) {
            $step = htmlspecialchars($_GET['step']);
        }
        switch ($step) {
            case 'view':
                require('view/admin/v_AdminLogin.php');
                break;
            case 'login':
                // Regarde si l'utilisateur existe et oriente la redirection en fonction 
                if ($adminController->tryToGetAdmin() != null) {
                    require('view/admin/v_Admin.php');
                } else {
                    require('view/admin/v_AdminLogin.php');
                }
                break;
            case 'addActivity':
                require('view/admin/v_AdminAddActivity.php');
                break;
            case 'addSituation':
                require('view/admin/v_AdminAddSituation.php');
                break;
            case 'updateActivity':
                require('view/admin/v_AdminUpdateActivity.php');
                break;
            case 'updateSituation':
                require('view/admin/v_AdminUpdateSituation.php');
                break;
            case 'updateActivityAction':
                require('view/admin/v_AdminUpdateActivityAction.php');
                break;
            case 'updateSituationAction':
                require('view/admin/v_AdminUpdateSituationAction.php');
                break;
            case 'deactivate':
                require('view/admin/v_AdminDeactivate.php');
                break;
        }
    }

    public function bookingRedirection()
    {

        $bookingController = new BookingController;

        $step = 'view';
        if (isset($_GET['step'])) {
            $step = htmlspecialchars($_GET['step']);
        }

        switch ($step) {
            case 'addBooking':
                $bookingController->addBooking($_GET['lesson_id'], $_GET['id_code']);
                require('view/v_CodeObtention.php');
                break;
        }
    }
}
