<?php
class produit
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $description = null;
    private ?int $prix = null;
    private ?int $quantite = null;
    private ?int $type = null;
    private ?string $image = null;
  

    public function __construct($id = null, $n, $d, $p, $q,$t,$i)
    {
        $this->id= $id;
        $this->nom = $n;
        $this->description = $d;
        $this->prix = $p;
        $this->quantite = $q;
        $this->type = $t;
        $this->image = $i;
    }


    public function getId()
    {
        return $this->id;
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


    public function getdescription()
    {
        return $this->description;
    }


    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }


    public function getprix()
    {
        return $this->prix;
    }


    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }


    public function getquantite()
    {
        return $this->quantite;
    }


    public function setquantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }
    public function gettype()
    {
        return $this->type;
    }


    public function settype($type)
    {
        $this->type = $type;

        return $this;
    }
    public function getimage()
    {
        return $this->image;
    }


    public function setimage($image)
    {
        $this->image = $image;

        return $this;
    }
    
}
