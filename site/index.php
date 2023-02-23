<?php
require_once('controllers/c_achat.php');
require_once('controllers/c_admin.php');
 require_once('controllers/c_Redirection.php');
 require_once('controllers/c_CodeInformation.php');


$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if(empty($action)) {
	$action = 'accueil';
}
// Navigation Barre Actions 
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
	default:
	require('view/v_HomePage.php');

}