<?php
namespace Models;

use PDO;

require_once 'libraries/Database.php';
require_once 'libraries/models/Model.php';

class Reservation extends Model
{
    protected $table = 'reservation';

    public function save($date_depart, $date_retour,int $client_id,int $voiture_id, string $adress_pickup, string $adress_retour,float $prix_total) {
        $sql = "INSERT INTO reservation (date_depart, date_retour, client_id, voiture_id, adress_pickup, adress_retour, prix_total) VALUES (:date_depart, :date_retour, :client_id, :voiture_id, :adress_pickup, :adress_retour, :prix_total)";
        $requete = $this->pdo->prepare($sql);
    
        $forma_date_depart = $date_depart->format('Y-m-d');
        $forma_date_retour = $date_retour->format('Y-m-d');
    
        $requete->bindParam(':date_depart', $forma_date_depart);
        $requete->bindParam(':date_retour', $forma_date_retour);
        $requete->bindParam(':client_id', $client_id);
        $requete->bindParam(':voiture_id', $voiture_id);
        $requete->bindParam(':adress_pickup', $adress_pickup);
        $requete->bindParam(':adress_retour', $adress_retour);
        $requete->bindParam(':prix_total', $prix_total);
    
        $requete->execute();
        return $this->pdo->lastInsertId();
    }
    
    public function checkAvailability(int $voiture_id, $date_depart, $date_retour) {
        $sql = "SELECT COUNT(*) FROM reservation WHERE voiture_id = :voiture_id AND ((date_depart <= :date_depart AND date_retour >= :date_depart) OR (date_depart <= :date_retour AND date_retour >= :date_retour))"; 
        $requete = $this->pdo->prepare($sql);

        $forma_date_depart = $date_depart->format('Y-m-d');
        $forma_date_retour = $date_retour->format('Y-m-d');

        $requete->bindParam(':voiture_id', $voiture_id);
        $requete->bindParam(':date_depart', $forma_date_depart);
        $requete->bindParam(':date_retour', $forma_date_retour);
        $requete->execute();
    
        return $requete->fetchColumn() == 0;
    }

    public function getDetailedReservationInfo(int $reservation_id) {
        $sql = "SELECT reservation.*, client.nom as client_nom, client.prenom as client_prenom, voiture.name as voiture_name, voiture.marque as voiture_marque 
        FROM reservation
        INNER JOIN client  ON reservation.client_id = client.id 
        INNER JOIN voiture  ON reservation.voiture_id = voiture.id 
        WHERE reservation.id = :reservation_id";

        $requete = $this->pdo->prepare($sql);
        $requete->bindParam(':reservation_id', $reservation_id);
        $requete->execute();
    
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function findByClientId($id) {
        $sql = "SELECT 
        reservation.*,
        voiture.name,
        voiture.marque,
        voiture.type,
        voiture.boiteVitesse,
        voiture.puissance,
        voiture.carburant,
        voiture.nombre_de_porte,
        voiture.nombre_de_siege,
        voiture.prix_jour
       
    FROM 
        {$this->table}
    INNER JOIN 
        voiture ON reservation.voiture_id = voiture.id
    WHERE 
        reservation.client_id = :client_id";

        $requete = $this->pdo->prepare($sql);
        $requete->bindParam(':client_id', $id);
        $requete->execute();
        
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    

    
}

