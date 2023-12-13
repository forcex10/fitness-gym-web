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

   
        private $pdp=null;
        
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

   
        function getPdp(){
            return($this->pdp);
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
        
       
        function setPdp($pdp){
            $this->pdp=$pdp;
        }
        
        
        
        
        
        
        
        function __construct($nom,$prenom,$email,$tel,$idjoueur,$password,$type,$pdp){
            $this->idjoueur=$idjoueur;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->tel=$tel;
            $this->email=$email;
            $this->password=$password;
            $this->type=$type;
        
            $this->pdp=$pdp;
          
        
        }
        
    }
}




?>