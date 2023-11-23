<?php
class cour
{
    private ?int $idCour = null;
    private ?string $nom = null;
    private ?string $description = null;
    private ?string $enseignant = null;
    private ?string $horaire = null;

    public function __construct($id = null, $n, $des, $esg, $h)
    {
        $this->idCour = $id;
        $this->nom = $n;
        $this->description = $des;
        $this->enseignant = $esg;
        $this->horaire = $h;
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
    public function getEnseignant()
    {
        return $this->enseignant;
    }
    public function getHoraire()
    {
        return $this->horaire;
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
    public function setEnseignant($enseignant)
    {
        $this->enseignant = $enseignant;

        return $this;
    }
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;

        return $this;
    }
}