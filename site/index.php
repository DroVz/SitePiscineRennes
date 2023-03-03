<?php
require_once('controllers/c_accueil.php');
require_once('controllers/c_achat.php');
require_once('controllers/c_verif.php');
require_once('controllers/c_admin.php');
require_once('controllers/c_panier.php');

session_start();

if (isset($_GET['action'])) {
	$action = htmlspecialchars($_GET['action']);
} else {
	$action = 'accueil';
}

// controllerFocus permet d'instancier la vue et le controller correspondant pour pouvoir acceder aux différentes fct 
// controllerFocus permet d'instancier la vue et le controller correspondant pour pouvoir acceder aux différentes fct 
switch ($action) {
	case 'accueil':
		accueil();
		break;
	case 'achat':
		achat();
		break;
	case 'verif':
		verif();
		break;
	case 'admin';
		gestion();
		break;
	case 'panier';
		panier();
		break;
	default:
		accueil();
}
