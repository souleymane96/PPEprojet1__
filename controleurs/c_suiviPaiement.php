<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idUtilisateur = $_SESSION['idUtilisateur'];
switch($action){

    case 'demandeSuiviPaiement':
        echo "bonjour";
        break;

}