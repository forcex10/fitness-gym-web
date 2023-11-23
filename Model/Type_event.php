<?php
class Type_event
{
    private ?int $idtype_event = null;
    private ?string $nom = null;


    public function __construct($idtype_event, $nom)
    {
        $this->idtype_event = $idtype_event;
        $this->nom = $nom;

    }


    public function getIdType_event()
    {
        return $this->idtype_event;
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


}
