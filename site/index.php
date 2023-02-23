<?php
// /!\ Les requires partent tous d'index (attention aux paths)/!\ \\
require_once('controllers/c_Redirection.php');
$ControllerRedirection = Redirection::getInstance();

// Récupère les infos du form 
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$step = filter_input(INPUT_GET, 'step', FILTER_SANITIZE_STRING);

if(empty($action)) {
	$action = 'accueil';
}
// Redirection action barre de nav 
switch($action) {
	case 'accueil' :
		require('view/v_HomePage.php');
		break;

	case 'achat' :
		achat();
		break;

	case 'verif' :
		require('view/v_CodeVerification.php') ;
		break;

	case 'admin' ;
		gestion() ;
		break;

// Redirection envoie de formulaire 
	case 'codeRedirection';
		$ControllerRedirection->codeRedirection();
		break;
	
	case 'codeAchat';
		$ControllerRedirection->achatRedirection();
		break;

	default:
	require('view/v_HomePage.php');

}