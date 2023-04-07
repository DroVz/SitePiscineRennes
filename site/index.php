<?php
// /!\ Les requires partent tous d'index (attention aux paths)/!\ \\
session_start();
require_once('controllers/c_Redirection.php');
$ControllerRedirection = Redirection::getInstance();

// Récupère les infos du form
$action = null;
$step = null;
if (isset($_GET['action'])) {
	$action = htmlspecialchars($_GET['action']);
}
if (isset($_GET['step'])) {
	$step = htmlspecialchars($_GET['step']);
}

if (empty($action)) {
	$action = 'accueil';
}
echo '<script>console.log("'. $action .'") </script>';

switch ($action) {

		// Redirections action barre de nav
	case 'accueil':
		require('view/v_HomePage.php');
		break;

	case 'achat':
		require('view/v_ChoixActivite.php');
		break;

	case 'verif':
		require('view/v_CodeVerification.php');
		break;

	case 'admin';
		gestion();
		break;

	case 'panier':
		require('view/v_PanierVue.php');
		break;

		// Redirections envoi de formulaire
	case 'codeRedirection';
		$ControllerRedirection->codeRedirection();
		break;

	case 'achatRedirection';
		$ControllerRedirection->achatRedirection();
		break;

	case 'panierRedirection';
		$ControllerRedirection->panierRedirection();
		break;
	case 'bookingNewLesson';
		
	default:
		require('view/v_HomePage.php');
}
