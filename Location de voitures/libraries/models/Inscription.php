<?php   
namespace Models;

use PDO;

require_once 'libraries/Database.php';
class Inscription
{
    protected $pdo;

    public function __construct(){
        $this->pdo = \Database::getPdo();
    }
    public function enregistrer(string $nom, string $prenom, $numero_de_telephone, string $email_adress, $mot_de_passe){

        $pattern = '/^0[1-9]([-. ]?[0-9]{2}){4}$/'; 

        if (!preg_match($pattern, $numero_de_telephone)) { 
            return "Le format du numéro de téléphone est invalide. Il doit commencer par un zéro et être composé de 10 chiffres.";
        }
    
        $sql = "SELECT * FROM client WHERE email_adress = :email_adress";
        $resultat = $this->pdo->prepare($sql);
        $resultat->execute(['email_adress' => $email_adress]);
        $email = $resultat->fetch();
    
        if ($email) {
            return 'Cette adresse email est déjà utilisée.';
        }

        $sql = "INSERT INTO client (nom, prenom, numero_de_telephone, email_adress, mot_de_passe) VALUES (:nom, :prenom, :numero_de_telephone, :email_adress, :mot_de_passe)";
        
        $requete = $this->pdo->prepare($sql);
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':numero_de_telephone', $numero_de_telephone);
        $requete->bindParam(':email_adress', $email_adress);
        $requete->bindParam(':mot_de_passe', $mot_de_passe);
        $requete->execute();
        
        if ($requete) {
            $message = "Inscription réussie !";
        } else {
            $message = "Erreur lors de l'inscription.";
        }
        return $message;
    }
}
?>
