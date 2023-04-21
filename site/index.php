<?php
// /!\ Les requires partent tous d'index (attention aux paths)/!\ \\
session_start();
require_once('controllers/c_Redirection.php');
$ControllerRedirection = Redirection::getInstance();

// Récupère les infos du form
$action = null;

if (isset($_GET['action'])) {
	$action = htmlspecialchars($_GET['action']);
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
	case 'bookingRedirection';
		$ControllerRedirection->bookingRedirection();
		break;
	default:
		require('view/v_HomePage.php');
}
