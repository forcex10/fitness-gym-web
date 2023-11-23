<?php
class Panier {
    private $id_panier;
    private $id_produit;
    private $quantite;

    public function __construct($id_panier,$id_produit,$quantite) {
        $this->id_panier =$id_panier;
        $this->id_produit= $id_produit;
        $this->quantite = $quantite;
    }
     // getters
    
    public function getIdPanier() {
        return $this->id_panier;
    }
    public function getIdProduit() {
        return $this->id_produit;
    }

    public function getQuantite() {
        return $this->quantite;
    }

    

    // Setters
    public function setIdPanier($id_panier) {
        $this->id_panier =$id_panier;
    }

    public function setIdProduit($id_produit) {
        $this->id_produit = $id_produit;
    }

    

    public function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    
}

?>