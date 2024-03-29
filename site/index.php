<?php
// /!\ Les requires partent tous d'index (attention aux paths)/!\ \\
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/c_Redirection.php');
$ControllerRedirection = Redirection::getInstance();

// Récupère les infos du form
$action = null;

if (isset($_GET['action'])) {
	$action = htmlspecialchars($_GET['action']);
	//Permet d'interpréter les requêtes GET avec le POST 
	$_POST['action'] = $action;
} else {
	if (isset($_POST['action'])) {
		$action = htmlspecialchars($_POST['action']);
	}
}

if (empty($action)) {
	$action = 'accueil';
}

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

	case 'panier':
		require('view/v_panierVue.php');
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
	case 'bookingRedirection';
		$ControllerRedirection->bookingRedirection();
		break;
	case 'adminRedirection';
		$ControllerRedirection->adminRedirection();
		break;

	case 'bookingNewLesson';
	default:
		require('view/v_HomePage.php');
}
