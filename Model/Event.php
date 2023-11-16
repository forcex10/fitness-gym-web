<?php
class Event
{
    private ?int $idevent = null;
    private ?string $nom = null;
    private ?string $local = null;
    private ?string $date = null;

    public function __construct($idevent, $nom, $local, $date)
    {
        $this->idEvent = $idevent;
        $this->nom = $nom;
        $this->local = $local;
        $this->date = $date;
    }


    public function getIdEvent()
    {
        return $this->idevent;
    }

    public function setidEvent($idevent){
        $this->idevent = $idevent;
        return $this;
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


    public function getLocalisation()
    {
        return $this->local;
    }


    public function setLocalisation($local)
    {
        $this->localisation = $local;

        return $this;
    }


    public function getDate()
    {
        return $this->date;
    }


    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }


}
