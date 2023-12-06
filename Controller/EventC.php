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
        VALUES (NULL, :nom, :local, :date, :temps, :description, :type_event, :image, :lat, :lng)"; // Add :coordinates
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $event->getNom(),
                'local' => $event->getLocalisation(),
                'date' => $event->getDate(),
                'temps' => $event->getTemps(),
                'description' => $event->getDescription(),
                'type_event' => $event->getType_event(),
                'image' => $event->getImage(),
                'lat' => $event->getLat(), // Add this line
                'lng' => $event->getLng(), // Add this line
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function updateEvent($event, $idevent)
{
    try {
        $db = config::getConnexion();

        // Vérifier si un nouveau fichier image est fourni
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'C:\xampp\htdocs\fitness-gym-web\View\Backoffice\template\uploads\\';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            // Télécharger le nouveau fichier image
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                // Mise à jour de l'image dans la base de données
                $query = $db->prepare(
                    'UPDATE evennement SET 
                        nom = :nom,
                        local = :local,
                        date = :date,
                        temps = :temps,
                        description = :description,
                        type_event = :type_event,
                        image = :image,
                        lat = :lat,
                        lng = :lng  
                    WHERE idevent = :idevent'
                );

                $result = $query->execute([
                    'idevent' => $idevent,
                    'nom' => $event->getNom(),
                    'local' => $event->getLocalisation(),
                    'date' => $event->getDate(),
                    'temps' => $event->getTemps(),
                    'description' => $event->getDescription(),
                    'type_event' => $event->getType_event(),
                    'image' => $_FILES['image']['name'],
                    'lat' => $event->getLat(), // Add this line
                    'lng' => $event->getLng(), // Add this line
                ]);
            } else {
                echo "Erreur lors du téléchargement de l'image.";
                return false;
            }
        } else {
            // Pas de nouvelle image, uniquement mise à jour des autres champs
            $query = $db->prepare(
                'UPDATE evennement SET 
                    nom = :nom,
                    local = :local,
                    date = :date,
                    temps = :temps,
                    description = :description,
                    type_event = :type_event,
                    lat = :lat,
                    lng = :lng  
                WHERE idevent = :idevent'
            );

            $result = $query->execute([
                'idevent' => $idevent,
                'nom' => $event->getNom(),
                'local' => $event->getLocalisation(),
                'date' => $event->getDate(),
                'temps' => $event->getTemps(),
                'description' => $event->getDescription(),
                'type_event' => $event->getType_event(),
                'lat' => $event->getLat(),
                'lng' => $event->getLng(), 
            ]);
        }

        if ($result) {
            $db->commit();
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } else {
            $db->rollBack();
            echo "Error updating record: " . $query->errorInfo()[2];
        }

        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    
    

    public function updateEventImage($idevent, $newImage)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evennement SET 
                    image = :newImage
                WHERE idevent = :idevent'
            );

            $result = $query->execute([
                'idevent' => $idevent,
                'newImage' => $newImage,
            ]);

            if ($result) {
                $db->commit();
            } else {
                $db->rollBack();
            }

            echo $query->rowCount() . " records UPDATED successfully <br>";
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
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
    
    /*function updateEvent($event, $idevent)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evennement SET 
                    nom = :nom,
                    local = :local,
                    date = :date,
                    temps = :temps,
                    description = :description
                WHERE idevent= :idevent'
            ); //,type_event = :type_event

            $query->execute([
                'idevent' => $idevent,
                'nom' => $event->getNom(),
                'local' => $event->getLocalisation(),
                'date' => $event->getDate(),
                'temps' => $event->getTemps(),
                'description' => $event->getDescription(),
                
                //,'type_event'=>$event->getType_event()

            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }*/
    
}