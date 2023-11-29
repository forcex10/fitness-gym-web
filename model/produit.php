<?php
class produit
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $description = null;
    private ?int $prix = null;
    private ?int $quantite = null;

    public function __construct($id = null, $n, $d, $p, $q)
    {
        $this->id= $id;
        $this->nom = $n;
        $this->description = $d;
        $this->prix = $p;
        $this->quantite = $q;
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
}
