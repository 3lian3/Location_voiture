<?php
namespace Models;

use PDO;

require_once 'libraries/models/Model.php';
// matrice de toute les classes "multiusage"

class Voiture extends Model
{ 
    protected $table = "voiture";

    public function menuDeroulant(string $item){
  
        $sql = "SELECT DISTINCT $item FROM {$this->table}";
        $requete = $this->pdo->prepare($sql);
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    
    public function recherche(){ 
        if (isset($_POST['barreRecherche'])) {
            $saisieUtilisateur = strtolower($_POST['barreRecherche']);
            $saisieUtilisateur = '%'. $saisieUtilisateur . '%';
            $sql = "SELECT * FROM {$this->table}
            WHERE LOWER(Marque) LIKE :saisie
            OR LOWER(name) LIKE :saisie 
            OR LOWER(type) LIKE :saisie";
            $requete = $this->pdo->prepare($sql);
            $requete->bindParam(':saisie', $saisieUtilisateur);
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }
    }

    public function rechercheParAttribut(string $attribut, string $valeur){
    
        $sql = "SELECT * FROM {$this->table} WHERE $attribut = :valeur";
        $requete = $this->pdo->prepare($sql);
        $requete->bindParam(':valeur', $valeur);
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    public function obtenirDonneesDeRecherche() {
     
        if (isset($_POST['barreRecherche']) && !empty($_POST['barreRecherche'])) {  
            $voitures = $this->recherche(); 
        } elseif (isset($_POST['carburant']) && !empty($_POST['carburant'])) { 
            $carburant = $_POST['carburant'];  
            $voitures = $this->rechercheParAttribut('carburant', $carburant);
        } elseif (isset($_POST['type']) && !empty($_POST['type'])) {  
            $type = $_POST['type'];
            $voitures = $this->rechercheParAttribut('type', $type);
        } else {
            $voitures = [];
        }
    
        return $voitures;
    }
    
}   

