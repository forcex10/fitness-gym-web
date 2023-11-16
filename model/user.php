<?php
if (!class_exists('User')) {
    class User {
        private $idclient=null;
        private $nom=null;
        private $prenom=null;
        private $email=null;
        private $tel=null;
        private $password=null;
        private $type=null;
        private $diplome=null;
        private $projetRc=null;
        
        function getId(){
        
            return($this->idclient);
        
        }
        function getNom(){
            return($this->nom);
        }
        function getPrenom(){
            return($this->prenom);
        }
        function getEmail(){
            return($this->email);
        }
        function getTel(){
            return($this->tel);
        }
        
        function getPassword(){
            return($this->password);
        }
     
        function getType(){
            return($this->type);
        }
        function getDiplome(){
            return($this->diplome);
        }
        function getProjetRc(){
            return($this->projetRc);
        }
        
        
        
        
        function setNom($nom){
            $this->nom=$nom;
        }
        function setPrenom($prenom){
            $this->prenom=$prenom;
        }
        function setEmail($email){
            $this->email=$email;
        }
        function setTel($tel){
            $this->tel=$tel;
        }
        function setId($idclient){
            $this->idclient=$idclient;
        }
        
        function setPassword($password){
            $this->password=$password;
        }
  
        function setType($type){
            $this->type=$type;
        }
        
        function setDiplome($diplome){
            $this->diplome=$diplome;
        }
        function setProjet($projetRc){
            $this->projetRc=$projetRc;
        }
        
        
        
        
        
        
        
        function __construct($nom,$prenom,$email,$tel,$idjoueur,$password,$type,$diplome,$projetRc){
            $this->idjoueur=$idjoueur;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->tel=$tel;
            $this->email=$email;
            $this->password=$password;
            $this->type=$type;
            $this->diplome=$diplome;
            $this->ProjetRc=$projetRc;
          
        
        }
        
    }
}




?>