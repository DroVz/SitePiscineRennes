<?php

require_once('controllers/accueil.php');
require_once('controllers/achat.php');
require_once('controllers/verification.php');

require_once('controllers/achatFormule.php');
require_once('controllers/achatResult.php');

require_once('controllers/infocode.php');
require_once('controllers/reservation.php');


if (isset($_GET['action']) && $_GET['action'] !== '') {
	if ($_GET['action'] === 'accueil') {
		accueil();
	} elseif ($_GET['action'] === 'achat') {
		achat(); 
	} else if ($_GET['action'] === 'achatFormule') {
		achatFormule();
	} else if ($_GET['action'] === 'achatResult') {
		achatResult();
	} else if ($_GET['action'] === 'verification') {
		verification();
	} else if ($_GET['action'] === 'infocode') {
		infocode();	
	} else if ($_GET['action'] === 'reservation') {
		reservation();	
	} else {
		echo "Erreur 404 : la page que vous recherchez n'existe pas.";
	}
}
	else {
	accueil(); 
}