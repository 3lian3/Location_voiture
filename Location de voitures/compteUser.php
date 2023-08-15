<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL); 

// compte utilisateur

session_start();
require_once 'libraries/models/Client.php';
require_once 'libraries/models/Reservation.php';
require_once 'libraries/autoloader.php';
// verif si user est connecté, si non renvoi à la page de connexion
if (!isset($_SESSION['logdin']) || !$_SESSION['logdin']) {
    die("Erreur : vous devez être connecté pour accéder à cette page.");
}
$id = $_SESSION["id"];
$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$emailAdress = $_SESSION["email_adress"];
$numeroDeTelephone = isset($_SESSION["numeroDeTelephone"]) ? $_SESSION["numeroDeTelephone"] : ''; 
$motDePasse = isset($_SESSION["motDePasse"]) ? $_SESSION["motDePasse"] : ''; 
// recuperation des info user
$clientModel = new \Models\Client($id, $prenom, $nom, $emailAdress, $numeroDeTelephone, $motDePasse);
$user = $clientModel->findByUserId($id);
// recuperation des info resa
$reservation = new \Models\Reservation();
$reservationsDetails = $reservation->findByClientId($id);
if (isset($_POST['delete_reservation']) && isset($_POST['reservation_id'])) {
    $id = intval($_POST['reservation_id']);

    $reservationDetails = $reservation->find($id);
    if($reservationDetails['client_id'] != $_SESSION['id']) {
        die("Erreur : vous ne pouvez pas supprimer cette réservation.");
    }

    $reservation->delete($id);
    header('Location: compteUser.php');
    exit;
}

$pageTitle = "Mon compte";
ob_start();
require('templates/users/compteUser_html.php');
$pageContent = ob_get_clean();
require 'templates/layout.php';
?>


