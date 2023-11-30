<?php
class courType
{
    private ?int $idtypeCour = null;
    private ?string $typenom = null;
    private ?string $typedescription = null;
   

    public function __construct($id = null, $n, $des)
    {
        $this->idtypeCour = $id;
        $this->typenom = $n;
        $this->typedescription = $des;
        
    }

    public function getIdTypeCour()
    {
        return $this->idtypeCour;
    }
    public function getTypeNom()
    {
        return $this->typenom;
    }
    public function getTypeDescription()
    {
        return $this->typedescription;
    }

    

    public function setTypeId($idtypeCour)
    {
        $this->idtypeCour = $idtypeCour;

        return $this;
    }

    public function setTypeNom($typenom)
    {
        $this->typenom = $typenom;

        return $this;
    }

    
    public function setTypeDescription($typedescription)
    {
        $this->typedescription = $typedescription;

        return $this;
    }

    



}