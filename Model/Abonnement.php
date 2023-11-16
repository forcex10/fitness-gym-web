<?php
class Abonnement {
    private $id_abonnement;
    private $username;
    private $cour;
    private $type;
    private $methode;
    private $num_cb;
    private $titulaire_cb;
    private $exp_cb;
    private $cvv_cb;
    private $num_visa;
    private $titulaire_visa;
    private $exp_visa;
    private $cvv_visa;
    private $num_mc;
    private $exp_mc;
    private $cvv_mc;
    private $num_edinar;
    private $code_edinar;

    public function __construct($id_abonnement,$username,$cour,$type,$methode,$num_cb,$titulaire_cb,$exp_cb,$cvv_cb,$num_visa,$titulaire_visa,$exp_visa,$cvv_visa,$num_mc,$exp_mc,$cvv_mc,$num_edinar,$code_edinar) {
        $this->id_abonnement =$id_abonnement;
        $this->username= $username;
        $this->cour = $cour;
        $this->type = $type;
        $this->methode = $methode;
        $this->num_cb = $num_cb;
        $this->titulaire_cb = $titulaire_cb;
        $this->exp_cb = $exp_cb;
        $this->cvv_cb = $cvv_cb;
        $this->num_visa = $num_visa;
        $this->titulaire_visa = $titulaire_visa;
        $this->exp_visa = $exp_visa;
        $this->cvv_visa = $cvv_visa;
        $this->num_mc = $num_mc;
        $this->exp_mc = $exp_mc;
        $this->cvv_mc = $cvv_mc;
        $this->num_edinar = $num_edinar;
        $this->code_edinar = $code_edinar;
    }
     // getters
    
    public function getIdAbonnement() {
        return $this->id_abonnement;
    }
    public function getUsername() {
        return $this->username;
    }

    public function getCour() {
        return $this->cour;
    }

    public function getType() {
        return $this->type;
    }

    public function getMethode() {
        return $this->methode;
    }

    public function getNumCb() {
        return $this->num_cb;
    }

    public function getTitulaireCb() {
        return $this->titulaire_cb;
    }

    public function getExpCb() {
        return $this->exp_cb;
    }

    public function getCvvCb() {
        return $this->cvv_cb;
    }

    public function getNumVisa() {
        return $this->num_visa;
    }

    public function getTitulaireVisa() {
        return $this->titulaire_visa;
    }

    public function getExpVisa() {
        return $this->exp_visa;
    }

    public function getCvvVisa() {
        return $this->cvv_visa;
    }

    public function getNumMc() {
        return $this->num_mc;
    }

    public function getExpMc() {
        return $this->exp_mc;
    }

    public function getCvvMc() {
        return $this->cvv_mc;
    }

    public function getNumEdinar() {
        return $this->num_edinar;
    }

    public function getCodeEdinar() {
        return $this->code_edinar;
    }

    // Setters

    public function setIdAbonnement($id_abonnement) {
        $this->id_abonnement = $id_abonnement;
    }

    public function setUsername($username) {
        $this->username =$username;
    }

    public function setCour($cour) {
        $this->cour = $cour;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setMethode($methode) {
        $this->methode = $methode;
    }

    public function setNumCb($num_cb) {
        $this->num_cb = $num_cb;
    }

    public function setTitulaireCb($titulaire_cb) {
        $this->titulaire_cb = $titulaire_cb;
    }

    public function setExpCb($exp_cb) {
        $this->exp_cb = $exp_cb;
    }

    public function setCvvCb($cvv_cb) {
        $this->cvv_cb = $cvv_cb;
    }

    public function setNumVisa($num_visa) {
        $this->num_visa = $num_visa;
    }

    public function setTitulaireVisa($titulaire_visa) {
        $this->titulaire_visa = $titulaire_visa;
    }

    public function setExpVisa($exp_visa) {
        $this->exp_visa = $exp_visa;
    }

    public function setCvvVisa($cvv_visa) {
        $this->cvv_visa = $cvv_visa;
    }

    public function setNumMc($num_mc) {
        $this->num_mc = $num_mc;
    }

    public function setExpMc($exp_mc) {
        $this->exp_mc = $exp_mc;
    }

    public function setCvvMc($cvv_mc) {
        $this->cvv_mc = $cvv_mc;
    }

    public function setNumEdinar($num_edinar) {
        $this->num_edinar = $num_edinar;
    }

    public function setCodeEdinar($code_edinar) {
        $this->code_edinar = $code_edinar;
    }
}

?>