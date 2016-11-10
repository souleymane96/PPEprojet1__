<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idUtilisateur = $_SESSION['idUtilisateur'];
switch($action){

    case 'demandeSuiviPaiement':
        $fiches = $pdo->getFichesValides();


        require "vues/v_demandeSuiviPaiement.php";
        break;

}