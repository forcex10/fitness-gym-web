<?php
class Commande {
    private $id_commande;
    private $id_client;
    private $date_commande;
    private $status;
    private $prix_commande;
    private $methode;
    private $num;
    private $cvv;
    private $exp;
    private $titulaire;
    private $adresse;
    private $ville;
    private $code_postale;
    private $livraison;
    private $lu;

    public function __construct($id_commande, $id_client, $date_commande, $status, $prix_commande, $methode, $num, $cvv, $exp, $titulaire, $adresse,$ville,$code_postale,$livraison,$lu) {
        $this->id_commande = $id_commande;
        $this->id_client = $id_client;
        $this->date_commande = $date_commande;
        $this->status = $status;
        $this->prix_commande = $prix_commande;
        $this->methode = $methode;
        $this->num = $num;
        $this->cvv = $cvv;
        $this->exp = $exp;
        $this->titulaire = $titulaire;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->code_postale = $code_postale;
        $this->livraison = $livraison;
        $this->lu = $lu;
    }

    

    
    

    // Getters
    public function getIdCommande() {
        return $this->id_commande;
    }

    public function getIdClient() {
        return $this->id_client;
    }

    public function getDateCommande() {
        return $this->date_commande;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getPrixCommande() {
        return $this->prix_commande;
    }

    public function getMethode() {
        return $this->methode;
    }

    public function getNum() {
        return $this->num;
    }

    public function getCvv() {
        return $this->cvv;
    }

    public function getExp() {
        return $this->exp;
    }

    public function getTitulaire() {
        return $this->titulaire;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getCodePostale() {
        return $this->code_postale;
    }
    public function getLivraison() {
        return $this->livraison;
    }

    public function getLu() {
        return $this->lu;
    }


    // Setters
    public function setIdCommande($id_commande) {
        $this->id_commande = $id_commande;
    }

    public function setIdClient($id_client) {
        $this->id_client = $id_client;
    }

    public function setDateCommande($date_commande) {
        $this->date_commande = $date_commande;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setPrixCommande($prix_commande) {
        $this->prix_commande = $prix_commande;
    }

    public function setMethode($methode) {
        $this->methode = $methode;
    }

    public function setNum($num) {
        $this->num = $num;
    }

    public function setCvv($cvv) {
        $this->cvv = $cvv;
    }

    public function setExp($exp) {
        $this->exp = $exp;
    }

    public function setTitulaire($titulaire) {
        $this->titulaire = $titulaire;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

 
    

    public function setCodePostale($code_postal) {
        $this->code_postale = $code_postal;
    }

    public function setLivraison($livraison) {
        $this->livraison = $livraison;
    }

    public function setLu($lu) {
        $this->lu = $lu;
    }
}
?>
