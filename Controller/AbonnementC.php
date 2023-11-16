<?php
require "C:/xampp/htdocs/fitness-gym-web/config.php" ;
class AbonnementC
{
    public function listAbonnement()
    {
        $sql = "SELECT * FROM abonnement";
        $db = config::getConnexion();
        try {
                    $liste =$db->query($sql);
                    return $liste;
            } 
        catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteAbonnement($ide)
    {
        $sql = "DELETE FROM abonnement WHERE Id_Abonnement = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);
        try {
            $req->execute();
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
    }

    function addAbonnement($Abonnement)
    {
        $sql = "INSERT INTO abonnement
        VALUES (NULL,:username,:cour,:type,:methode,:num_cb,:titulaire_cb,:exp_cb,:cvv_cb,:num_visa,:titulaire_visa,:exp_visa,:cvv_visa,:num_mc,:exp_mc,:cvv_mc,:num_edinar,:code_edinar)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
            'username'=> $Abonnement->getUsername(),
            'cour' => $Abonnement->getCour(),
            'type' => $Abonnement->getType(),
            'methode' => $Abonnement->getMethode(),
            'num_cb' =>$Abonnement->getNumCb(),
            'titulaire_cb' =>$Abonnement->getTitulaireCb(),
            'exp_cb' =>$Abonnement->getExpCb(),
            'cvv_cb' => $Abonnement->getCvvCb(),
            'num_visa' => $Abonnement->getNumVisa(),
            'titulaire_visa' =>$Abonnement->getTitulaireVisa(),
            'exp_visa' =>$Abonnement->getExpVisa(),
            'cvv_visa' =>$Abonnement->getCvvVisa(),
            'num_mc' =>$Abonnement->getNumMc(),
            'exp_mc' =>$Abonnement->getExpMc(),
            'cvv_mc' =>$Abonnement->getCvvMc(),
            'num_edinar' => $Abonnement->getNumEdinar(),
            'code_edinar' => $Abonnement->getCodeEdinar(),

        ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            }
    }


} 
?>