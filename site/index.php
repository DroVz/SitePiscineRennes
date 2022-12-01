<?php

require_once('controllers/c_accueil.php');
require_once('controllers/c_achat.php');
require_once('controllers/c_verif.php');

require_once('controllers/c_achatFormule.php');
require_once('controllers/c_achatResult.php');

require_once('controllers/c_verifInfo.php');
require_once('controllers/c_verifReservation.php');

try {
	if (isset($_GET['action']) && $_GET['action'] !== '') {
		if ($_GET['action'] === 'accueil') {
			accueil();
		} elseif ($_GET['action'] === 'achat') {
			achat(); 
		} else if ($_GET['action'] === 'achatFormule') {
			achatFormule();
		} else if ($_GET['action'] === 'achatResult') {
			achatResult();
		} else if ($_GET['action'] === 'verif') {
			verif();
		} else if ($_GET['action'] === 'verifInfo') {
			verifInfo();	
		} else if ($_GET['action'] === 'verifReservation') {
			verifReservation();	
		} else {
			throw new Exception("La page que vous recherchez n'existe pas.");
		}
	}
		else {
		accueil(); 
	}
} catch (Exception $e) {
	echo 'Erreur : '.$e->getMessage();
}