<?php
namespace Models;

use PDO;

require_once 'libraries/Database.php';
require_once 'libraries/models/Client.php';
class Connexion
{
   protected $pdo;

    public function __construct() {
        $this->pdo = \Database::getPdo();
    }

    public function getUserByEmail($email) {
        
        $sql = "SELECT id, prenom, nom, email_adress, numero_de_telephone, mot_de_passe FROM client WHERE email_adress = :email";
        $requete = $this->pdo->prepare($sql); 
        $requete->bindParam(":email", $email, PDO::PARAM_STR); 
        
        if($requete->execute()){ 
            if($requete->rowCount() > 0){ 
                $user_data = $requete->fetch(); 
                $user = new Client(  
                    $user_data['id'],
                    $user_data['prenom'],
                    $user_data['nom'],
                    $user_data['email_adress'],
                    $user_data['numero_de_telephone'],
                    $user_data['mot_de_passe'],
             
                );
                return $user; 
            }
        }
        return null;
    }
    
}

