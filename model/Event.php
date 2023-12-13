<?php
class Event
{
    private ?int $idevent = null;
    private ?string $nom = null;
    private ?string $local = null;
    private ?string $date = null;
    private ?string $temps = null;
    private ?string $description = null;
    private ?string $type_event = null;
    private ?string $image = null;
    private ?string $lat = null; 
    private ?string $lng = null; 


    public function __construct($idevent, $nom, $local, $date, $temps, $description, $type_event,$image,$lat,$lng) 
    {
        $this->idevent = $idevent;
        $this->nom = $nom;
        $this->local = $local;
        $this->date = $date;
        $this->temps = $temps;
        $this->description = $description;
        $this->type_event = $type_event;
        $this->image = $image;
        $this->lat = $lat;
        $this->lng = $lng; 
    }
    


    public function getIdEvent()
    {
        return $this->idevent;
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
    public function getTemps()
    {
        return $this->temps;
    }


    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }
    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }




    public function getType_event()
    {
        return $this->type_event;
    }


    public function setType_event($type_event)
    {
        $this->type_event = $type_event;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng)
    {
        $this->lng = $lng;
        return $this;
    }


}
