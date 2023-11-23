<?php
require_once "C:/xampp/htdocs/fitness-gym-web/config.php" ;
class TypeAbonnementC
{
    public function listTypeAbonnement()
    {
        $sql = "SELECT * FROM type_abonnement";
        $db = config::getConnexion();
        try {
                    $liste =$db->query($sql);
                    return $liste;
            } 
        catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteTypeAbonnement($ide)
    {
        $sql = "DELETE FROM type_abonnement WHERE id_type_abo = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);
        try {
            $req->execute();
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
    }

    function addTypeAbonnement($TypeAbonnement)
    {
        $sql = "INSERT INTO type_abonnement
        VALUES (NULL,:nom,:duree,:prix)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
            'nom'=> $TypeAbonnement->getNom(),
            'duree' => $TypeAbonnement->getDuree(),
            'prix' => $TypeAbonnement->getPrix(),
        ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            }
    }

    function showTypeAbonnement($id_type_abo)
    {
        $sql = "SELECT * from type_abonnement where id_type_abo = $id_type_abo";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $abonnement = $query->fetch();
            return $abonnement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateTypeAbonnement($type_abonnement, $id_type_abo)
    {
        $sql = "UPDATE type_abonnement SET 
                    nom = :nom,
                    duree = :duree,
                    prix= :prix
                WHERE id_type_abo = :id";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $type_abonnement->getNom(),
                'duree' => $type_abonnement->getDuree(),
                'prix' => $type_abonnement->getPrix(),
                'id' =>$id_type_abo
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function afficherAbonnement($id_type_abo){

        $sql = "SELECT * from abonnements where id_type_abo = $id_type_abo";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $abonnement = $query->fetchALL();
            return $abonnement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }

    }

    

} 
?>