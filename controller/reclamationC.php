<?php

require_once(__DIR__ . '/../config.php');
class reclamationC
{
    public function reclamation()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addreclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation VALUES (NULL, :nom, :email, :message)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $reclamation->getNom(),
                'email' => $reclamation-> getemail(),
                'message' => $reclamation->getmessage(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function deletereclamation($ide)
    {
        $sql = "DELETE FROM reclamation WHERE id_reclamation = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletereall()
    {
        $sql = "DELETE  FROM  reclamation ";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }








}
    