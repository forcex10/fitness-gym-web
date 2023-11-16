<?php

require_once(__DIR__ . '/../Config.php');

class EventC
{

    public function listeEvent()
    {
        $sql = "SELECT * FROM evennement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteEvent($idevent)
    {
        $sql = "DELETE FROM evennement WHERE idevent = :idevent";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idevent', $idevent);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addEvent($event)
    {
        $sql = "INSERT INTO evennement 
        VALUES (NULL, :nom,:local, :date)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $event->getNom(),
                'local' => $event->getLocalisation(),
                'date' => $event->getDate(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function showEvent($idevent)
    {
        $sql = "SELECT * from evennement where idevent = $idevent";
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
    
    function updateEvent($event, $idevent)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evennement SET 
                    nom = :nom,
                    local = :local,
                    date = :date 
                WHERE idevent= :id'
            );

            $query->execute([
                'id' => $idevent,
                'nom' => $event->getNom(),
                'local' => $event->getLocalisation(),
                'date' => $event->getDate()

            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
}