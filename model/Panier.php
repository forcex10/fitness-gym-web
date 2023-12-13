<?php
class Panier {
    private $id_panier;
    private $id_client;
    private $id_produit;
    private $quantite;
    private $totale;

    public function __construct($id_panier, $id_client,$id_produit,$quantite,$totale) {
        $this->id_panier =$id_panier;
        $this->id_client =$id_client;
        $this->id_produit= $id_produit;
        $this->quantite = $quantite;
        $this->totale = $totale;
    }
     // getters
    
    public function getIdPanier() {
        return $this->id_panier;
    }

    public function getIdClient() {
        return $this->id_client;
    }
    public function getIdProduit() {
        return $this->id_produit;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    public function getTotale() {
        return $this->totale;
    }

    


    

    // Setters
    public function setIdPanier($id_panier) {
        $this->id_panier =$id_panier;
    }

    public function setIdClient($id_client) {
        $this->id_client =$id_client;
    }

    public function setIdProduit($id_produit) {
        $this->id_produit = $id_produit;
    }

    

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    public function setTotale($totale) {
        $this->totale = $totale;
    }

    
}

?>