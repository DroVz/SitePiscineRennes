<?php

require_once('controllers/accueil.php');
require_once('controllers/formule.php');
require_once('controllers/verification.php');

require_once('controllers/paiement.php');
require_once('controllers/infocode.php');
require_once('controllers/reservation.php');
require_once('controllers/nouveaucode.php');

if (isset($_POST['action']) && $_POST['action'] !== '')
{
	if ($_POST['action'] === 'nouveaucode') {
        nouveaucode();
	} else if ($_POST['action'] === 'reservation') {
		reservation();
	} else if ($_POST['action'] === 'paiement') {
		paiement(); }
	else if ($_POST['action'] === 'infocode') {
		infocode();
	} else {
		accueil();
	}
} else {
	if (isset($_GET['action']) && $_GET['action'] !== '')
	{
		if ($_GET['action'] === 'accueil') {
			accueil();
		} elseif ($_GET['action'] === 'formule') {
			   formule(); 
		} else if ($_GET['action'] === 'verification') {
			verification();
		} else {
			echo "Erreur 404 : la page que vous recherchez n'existe pas.";
		}
	} else {
		accueil();
	}
}



