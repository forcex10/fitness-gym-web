<?php
class TypeAbonnement {
    private $id_type_abo;
    private $nom;
    private $duree;
    private $prix;


    public function __construct($id_type_abo,$nom,$duree,$prix) {
        $this->$id_type_abo =$id_type_abo;
        $this->nom= $nom;
        $this->duree = $duree;
        $this->prix = $prix;
    }
     // getters
    
    public function getIdTypeAbo() {
        return $this->id_type_abo;
    }
    public function getNom() {
        return $this->nom;
    }

    public function getDuree() {
        return $this->duree;
    }
    public function getPrix() {
        return $this->prix;
    }


    // Setters
    public function setIdTypeAbo($id_type_abo) {
        $this->id_type_abo =$id_type_abo;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    

    public function setDuree($duree) {
        $this->duree = $duree;
    }
    public function setPrix($prix) {
        $this->prix = $prix;
    }

    
}

?>