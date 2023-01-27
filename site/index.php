<?php

require_once('controllers/c_accueil.php');
require_once('controllers/c_achat.php');
require_once('controllers/c_verif.php');
require_once('controllers/c_admin.php');

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if(empty($action)) {
	$action = 'accueil';
}

switch($action) {
	case 'accueil' :
		accueil();
		break;
	case 'achat' :
		achat();
		break;
	case 'verif' :
		verif() ;
		break;
	case 'admin' ;
		gestion() ;
		break;
		default:
		accueil();
}