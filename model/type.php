<?php
class type
{
    private ?int $idtype = null;
    private ?string $nomtype = null;
    private ?string $descriptiontype = null;

    public function __construct($id = null, $n, $d)
    {
        $this->idtype= $id;
        $this->nomtype = $n;
        $this->descriptiontype = $d;
       
    }


    public function getIdtype()
    {
        return $this->idtype;
    }


    public function getNomtype()
    {
        return $this->nomtype;
    }


    public function setNomtype($nom)
    {
        $this->nomtype = $nom;

        return $this;
    }


    public function getdescriptiontype()
    {
        return $this->descriptiontype;
    }


    public function setdescriptiontype($description)
    {
        $this->descriptiontype = $description;

        return $this;
    }
}