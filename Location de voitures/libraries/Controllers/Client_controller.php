<?php
namespace Controllers;

use Models\Client;

require_once 'libraries/models/Inscription.php';
require_once 'libraries/models/Client.php';
require_once 'libraries/models/Connexion.php';
require_once 'libraries/utils.php';
class Client_controller
{

    public function inscription(){
        
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $numero_de_telephone = $_POST["numero_de_telephone"];
        $email_adress = $_POST["email_adress"];
        $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
    
        $inscription = new \Models\Inscription();
        $message = $inscription->enregistrer($nom, $prenom, $numero_de_telephone, $email_adress, $mot_de_passe);
    }

    $pageTitle = "inscription";
    ob_start();
    require('templates/users/inscriptionUser_html.php');
    $pageContent = ob_get_clean();
    require 'templates/layout.php';

    }

    public function connexion(){
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        $password = $_POST["password"]; 
        $connexion = new \Models\Connexion(); 
        $user = $connexion->getUserByEmail($_POST["email"]); 
        } 

        if($user){
            if(password_verify($password, $user->getMotDePasse())) { 
                $_SESSION["logdin"] = true;
                $_SESSION["id"] = $user->getId(); 
                $_SESSION["email_adress"] = $user->getEmailAdress(); 
                $_SESSION["prenom"] = $user->getPrenom();
                    if (isset($_SESSION['redirect_url'])) { 
                        $url = $_SESSION['redirect_url']; 
                        unset($_SESSION['redirect_url']);
                        header('Location: ' . $url);
                    } else {
                        header('Location: index.php');
                    }
                    exit();                        
                } else {
                    echo "Le mot de passe que vous avez entré n'est pas valide.";
                }
                } else {
                echo "Cet utilisateur n'existe pas.";
                } 

        $pageTitle = 'Connexion'; 
        ob_start(); 
        require('templates/users/connexionUser_html.php');
        $pageContent = ob_get_clean();
        require 'templates/layout.php';

    }
    public function deconnexion(){
  
        if (isset($_SESSION['logdin']) && $_SESSION['logdin']) {
            unset($_SESSION['logdin']);
            unset($_SESSION['prenom']); 
            session_destroy();
        }else{
        header('Location: index.php');
        exit;
        // redirect('index.php');
        }
        $pageTitle = "deconnexion";
        ob_start();
        require('templates/users/connexionUser_html.php');
        $pageContent = ob_get_clean();
        require 'templates/layout.php';
    }
        
}