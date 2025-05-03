<?php 
class commande{
    private $idcommande;
    private $datecommande;
    private $montanttotal;
    private $idclient;
    private $items=array();
    public function __construct($idcommande,$datecommande,$montanttotal,$idclient){
        $this->datecommande=$datecommande;
        $this->montanttotal=$montanttotal;
        $this->idclient=$idclient;
    }
    //getters
    public function getIdCommande(){
        return $this->idcommande;
    }
    public function getDateCommande(){
        return $this->datecommande;
    }
    public function getMontantTotal(){
        return $this->montanttotal;
    }
    public function getIdClient(){
        return $this->idclient;
    }
    public function getItems(){
        return $this->items;
    }
    //setters
    public function setIdCommande($idcommande){
        $this->idcommande=$idcommande;
    }
    public function setDateCommande($datecommande){
        $this->datecommande=$datecommande;
    }
    public function setMontantTotal($montanttotal){
        $this->montanttotal=$montanttotal;
    }
    public function setIdClient($idclient){
        $this->idclient=$idclient;
    }
    public function setItems($items){
        $this->items=$items;
    }
}
?>