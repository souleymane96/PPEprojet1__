<?php
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
session_start();

if(isset($_GET['action']) && $_GET['action'] !== 'generatePDF') {
    include("vues/v_entete.php");
}
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("controleurs/c_connexion.php");break;
	}
	case 'gererFrais' :{
		include("controleurs/c_gererFrais.php");break;
	}
	case 'etatFrais' :{
		include("controleurs/c_etatFrais.php");break; 
	}

	case 'gererValidationFrais':{
		include("controleurs/c_gererValidationFrais.php");break;
	}

    case 'suiviPaiement':{
        include("controleurs/c_suiviPaiement.php"); break;
    }
        
 
}

if(isset($_GET['action']) && $_GET['action'] !== 'generatePDF'){
    include("vues/v_pied.php") ;
}