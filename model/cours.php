<?php
class cour
{
    private ?int $idCour = null;
    private ?string $nom = null;
    private ?string $description = null;
    private ?string $prix = null;
    private ?string $niveau = null;
    private ?string $type = null;
    private ?string $image = null;

    public function __construct($id = null, $n, $des, $esg, $h, $ty, $mg)
    {
        $this->idCour = $id;
        $this->nom = $n;
        $this->description = $des;
        $this->prix = $esg;
        $this->niveau = $h;
        $this->type = $ty;
        $this->image = $mg;
    }
    //getter
    public function getIdCour()
    {
        return $this->idCour;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getprix()
    {
        return $this->prix;
    }
    public function getniveau()
    {
        return $this->niveau;
    }
    public function gettypes()
    {
        return $this->type;
    }
    public function getimage()
    {
        return $this->image;
    }

    //setter
    public function setId($idCour)
    {
        $this->idCour = $idCour;

        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    public function setprix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
    public function setniveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }
    public function setType($type)
    {
        $this->type= $type;

        return $this;
    }
    public function setimage($image)
    {
        $this->image= $image;

        return $this;
    }
}