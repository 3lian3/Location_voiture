<?php
namespace Models;

require_once 'libraries/models/Model.php';

class Client extends Model
{
    private $id;
    private $prenom;
    private $nom;
    private $emailAdress;
    private $numeroDeTelephone;
    private $motDePasse;
    protected $table = 'client';

    public function __construct($id, $prenom, $nom, $emailAdress, $numeroDeTelephone, $motDePasse){
        parent::__construct();
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->emailAdress = $emailAdress;
        $this->numeroDeTelephone = $numeroDeTelephone;
        $this->motDePasse = $motDePasse;
    }
    
    public function getId(){
        return $this->id;
    }
    public function setId($id): self{
        $this->id = $id;
        return $this;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom): self{
        $this->prenom = $prenom;
        return $this;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom): self{
        $this->nom = $nom;
        return $this;
    }
    public function getEmailAdress(){
        return $this->emailAdress;
    }
    public function setEmailAdress($emailAdress): self{
        $this->emailAdress = $emailAdress;
        return $this;
    }
        public function getNumeroDeTelephone(){
        return $this->numeroDeTelephone;
    }
    public function setNumeroDeTelephone($numeroDeTelephone): self{
        $this->numeroDeTelephone = $numeroDeTelephone;
        return $this;
    }
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }
    public function setMotDePasse($motDePasse): self{
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function findByUserId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    

}

    
