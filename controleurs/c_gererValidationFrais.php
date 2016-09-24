<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idUtilisateur = $_SESSION['idUtilisateur'];
switch($action){
    case "demandeValiderFrais": {
        $lesVisiteurs = $pdo->getVisiteurs();
        $lesMois=$pdo->getLesMoisDisponibles($idUtilisateur);
        // Afin de sélectionner par défaut le dernier mois dans la zone de liste
        // on demande toutes les clés, et on prend la première,
        // les mois étant triés décroissants
        $lesCles = array_keys( $lesMois );
        $moisASelectionner = $lesCles[0];
        include("vues/v_listeMoisComptable.php");
        break;
    }
    case "voirEtatFrais": {
        $leMois = $_POST['lstMois'];
        $lesMois=$pdo->getLesMoisDisponibles($_POST['lstVisiteur']);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($_POST['lstVisiteur'],$leMois);
        $lesFraisForfait= $pdo->getLesFraisForfait($_POST['lstVisiteur'],$leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($_POST['lstVisiteur'],$leMois);
        $numAnnee =substr( $leMois,0,4);
        $numMois =substr( $leMois,4,2);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif =  $lesInfosFicheFrais['dateModif'];
        $dateModif =  dateAnglaisVersFrancais($dateModif);
        $infosVisiteur = $pdo->getVisiteur($_POST['lstVisiteur']);
        $visiteur = $infosVisiteur["nom"] . " " . $infosVisiteur["prenom"];
        include("vues/v_etatFrais.php");
    }
}