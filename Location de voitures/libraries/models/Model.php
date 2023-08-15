<?php
namespace Models;

use PDO;

require_once 'libraries/database.php';
abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct(){
        $this->pdo = \Database::getPdo();
    }

    public function findAll(?string $order = ""){
        
        $sql = "SELECT * FROM {$this->table}";
        if($order){
            $sql .= "ORDER BY" . $order;
        }
        $resultats = $this->pdo->query($sql);
        $item = $resultats->fetchAll();
        return $item;
    }

    public function find(int $id){

        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(['id' => $id]);
        $resultat = $query->fetch();
        return $resultat;
    }

    public function delete(int $id) : void{

        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->execute(['id' => $id]);
    }

}