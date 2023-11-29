<?php
class Com
{
    private ?int $idcom = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $contenu = null;
    private ?string $img= null;
    private ?int $postFK= null; // Ajout de la propriété idpost


    public function __construct($id, $n, $p, $a, $d, $i,$postFK)
    {
        $this->idcom = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $a;
        $this->contenu = $d;
        $this->img = $i;
        $this->postFK = $postFK;
    }


    public function getidcom()
    {
        return $this->idcom;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getcontenu()
    {
        return $this->contenu;
    }


    public function setcontenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getimg()
    {
        return $this->img;
    }


    public function setimg($img)
    {
        $this->img = $img;

        return $this;
    }

    public function getpostFK()
    {
        return $this->postFK;
    }

    public function setpostFK($postFK)
    {
        $this->postFK = $postFK;

        return $this;
    }
}
