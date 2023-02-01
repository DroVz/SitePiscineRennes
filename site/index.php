<?php
require_once('controllers/c_HomePage.php');
require_once('controllers/c_achat.php');
require_once('controllers/c_verif.php');
require_once('controllers/c_admin.php');

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if(empty($action)) {
	$action = 'accueil';
}
// controllerFocus permet d'instancier la vue et le controller correspondant pour pouvoir acceder aux différentes fct 
switch($action) {
	case 'accueil' :
		require('view/v_accueil.php');
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
	require('view/v_accueil.php');

}