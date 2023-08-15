<?php
namespace Controllers;
require_once 'libraries/models/Voiture.php';
require_once 'libraries/models/Reservation.php';
require_once 'libraries/utils.php';

class Voiture_controller
{
    public function index(){

        $voiture = new \Models\Voiture(); 
        if (isset($_POST['barreRecherche']) || isset($_POST['carburant']) || isset($_POST['type'])) {
            $voitures = $voiture->obtenirDonneesDeRecherche();
        } else {
            $voitures = $voiture->findAll();
        }
        $carburants = $voiture->menuDeroulant('carburant');
        $types = $voiture->menuDeroulant('type');
    
    $pageTitle = 'Accueil';
    ob_start();
    require('templates/voitures/index_html.php');
    $pageContent = ob_get_clean();
    require 'templates/layout.php';
    }

    public function details(){
  
        $voiture_id = null; 

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $voiture_id = $_GET['id']; 
        }
        if (!$voiture_id) { 
            header("Location: soumettreReservation.php");
            exit;
            // redirect("soumettreReservation.php");
        }

        $detailVoiture = new \Models\Voiture();
        $voiture = $detailVoiture->find($voiture_id);

        if (!isset($_SESSION['logdin']) || $_SESSION['logdin'] !== true || !isset($_SESSION['id'])) { 
            $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI']; 
            header('Location: connexionUser.php');
            exit();
            // redirect('connexionUser.php');
        }
        $client_id = $_SESSION['id'];

        $reservation = new \Models\Reservation();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $date_depart = new \DateTime($_POST['date_depart']);
            $date_retour = new \DateTime($_POST['date_retour']);
            $adress_pickup = $_POST['adress_pickup'];
            $adress_retour = $_POST['adress_retour'];

            $duree = $date_depart->diff($date_retour)->days; 
            
            $prix_total = $duree * $voiture['prix_jour'];

            $isAvailable = $reservation->checkAvailability($voiture_id, $date_depart, $date_retour);

        if ($isAvailable) {
        
            $_SESSION['reservation'] = [
                'date_depart' => $date_depart->format('Y-m-d'),
                'date_retour' => $date_retour->format('Y-m-d'),
                'adress_pickup' => $adress_pickup,
                'adress_retour' => $adress_retour,
                'prix_total' => $prix_total,
                'voiture_id' => $voiture_id,
                'client_id' => $client_id,
            ];
            header('Location: soumettreReservation.php');
            exit();
            // redirect('soumettreReservation.php');
   
        } else {  
            $errorMessage = "La voiture n'est pas disponible aux dates sélectionnées.";
            header('Location: detailVoiture.php?id=' . $voiture_id . '&error=' . urlencode($errorMessage));
            exit;
            // redirect('detailVoiture.php?id=' . $voiture_id . '&error=' . urlencode($errorMessage));
            }
        }

    $pageTitle = "Détail voiture de location";
    ob_start();
    require('templates/voitures/detailVoiture_html.php');
    $pageContent = ob_get_clean();
    require 'templates/layout.php';

    }
   
}