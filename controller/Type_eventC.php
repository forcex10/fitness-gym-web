<?php

require_once(__DIR__ . '/../config.php');

class Type_eventC
{

    public function listeType_event()
    {
        $sql = "SELECT * FROM type_evennement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteType_event($idtype_event)
    {
        $sql = "DELETE FROM type_evennement WHERE idtype_event = :idtype_event";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idtype_event', $idtype_event);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addType_event($type_event)
    {
        $sql = "INSERT INTO type_evennement 
        VALUES (NULL, :nom)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $type_event->getNom(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    //'description' => $type_event->getDescription(),
      //          'temps' => $type_event->getTemps(),

// In Type_eventC.php

public function showType_event($idtype_event) {
    try {
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT nom FROM type_evennement WHERE idtype_event = :idtype_event");
        $query->bindParam(':idtype_event', $idtype_event, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchColumn(); // Fetch the value directly
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function showType_event2($idtype_event){
    {
        $sql = "SELECT * from type_evennement where idtype_event = $idtype_event";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
    
    function updateType_event($type_event, $idtype_event)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE type_evennement SET 
                    nom = :nom
                    
                WHERE idtype_event= :idtype_event'
            );

            $query->execute([
                'idtype_event' => $idtype_event,
                'nom' => $type_event->getNom()
                

            ]);
            

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
  public function afficherEvent($idtype_event) {
        try {
            $pdo = config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM evennement WHERE type_event = :idtype_event");
            $query->execute(['idtype_event' => $idtype_event]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    

 public function afficherType_event() {
        try {
            $pdo=config::getConnexion();
            $query = $pdo->prepare("SELECT * FROM type_evennement");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
}
