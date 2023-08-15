<?php
namespace Controllers;
require_once 'libraries/models/Reservation.php';
require_once 'libraries/models/Voiture.php';

class Reservation_controller
{
    public function soumettreResa(){
     
        $reservationDetails = $_SESSION['reservation'] ?? null;

        if (!$reservationDetails) {
            header('Location: index.php');
            exit;
          
        }

        $reservation = new \Models\Reservation();

        $voiture = new \Models\Voiture();

        $date_depart = new \DateTime($reservationDetails['date_depart']);
        $date_retour = new \DateTime($reservationDetails['date_retour']);

        $client_id = $reservationDetails['client_id'];
        $voiture_id = $reservationDetails['voiture_id'];
        $adress_pickup = $reservationDetails['adress_pickup'];
        $adress_retour = $reservationDetails['adress_retour'];
        $prix_total = $reservationDetails['prix_total'];

        if (!$voiture_id) {
            header('Location: index.php');
            exit;
        }

        $voiture = $voiture->find($voiture_id);

        $pageTitle = "soumettre";
        ob_start();
        require('templates/reservations/soumettre_html.php'); 
        $pageContent = ob_get_clean();
        require 'templates/layout.php';

    }

    public function validationDuUser(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            $voiture_id = $_POST['id']; 

            $reservationDetails = $_SESSION['reservation'] ?? null;
            if (!$reservationDetails || $voiture_id != $reservationDetails['voiture_id']) {
                echo '<p class="erreur">Erreur : Aucun détail de voiture ou de réservation correspondant</p>';
                exit;
            }

            $reservation = new \Models\Reservation();

            $date_depart = new \DateTime($reservationDetails['date_depart']);
            $date_retour = new \DateTime($reservationDetails['date_retour']);
            $client_id = $reservationDetails['client_id'];
            $adress_pickup = $reservationDetails['adress_pickup'];
            $adress_retour = $reservationDetails['adress_retour'];
            $prix_total = $reservationDetails['prix_total'];

            $reservationId = $reservation->save($date_depart, $date_retour, $client_id, $voiture_id, $adress_pickup, $adress_retour, $prix_total);
            header('Location: confirmationReservation.php?id=' . $reservationId);
            exit;
          
            }

        $pageTitle = "Validation";
        ob_start();
        require('templates/reservations/confirmationReservation_html.php');
        $pageContent = ob_get_clean();
        require 'templates/layout.php';
        }

    public function confirmationResa(){

        $reservationId = $_GET['id'] ?? null; 

        if (!$reservationId) {
            header('Location: index.php');
            exit;
        }

        $reservation = new \Models\Reservation();
        $reservationDetails = $reservation->getDetailedReservationInfo($reservationId); 

        $pageTitle = "Confirmation";
        ob_start();
        require('templates/reservations/confirmationReservation_html.php');
        $pageContent = ob_get_clean();
        require 'templates/layout.php';

    }


}