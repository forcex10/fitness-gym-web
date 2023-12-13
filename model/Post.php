<?php
class Post
{
    private ?int $idpost = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $contenu = null;
    private ?string $img= null;
    private ?string $date= null;

    public function __construct($id = null, $n, $p, $a, $d, $i,$da)
    {
        $this->idpost = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->email = $a;
        $this->contenu = $d;
        $this->img = $i;
        $this->date = $da; // Correction : attribuer la valeur pour la date
    }


    public function getidpost()
    {
        return $this->idpost;
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


    public function getdate()
    {
        return $this->date;
    }


    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }
}
