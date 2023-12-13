<?php
class reclamation
{
    private ?int $id_reclamation = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?string $message = null;
   
  

    public function __construct($id_reclamation = null, $nom, $email, $message)
    {
        $this->id_reclamation= $id_reclamation;
        $this->nom = $nom;
        $this->email = $email;
        $this->message = $message;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getNom()
    {
        return $this->nom;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function getmessage()
    {
        return $this->message;
    }

    
}
