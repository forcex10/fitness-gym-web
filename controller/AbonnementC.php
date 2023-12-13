<?php
require_once(__DIR__ . '/../Config.php');
class AbonnementC
{
    public function listAbonnement()
    {
        $sql = "SELECT * FROM abonnements";
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
        $sql = "DELETE FROM abonnements WHERE Id_Abonnement = :id";
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
        $sql = "INSERT INTO abonnements
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

    function showAbonnement($id_Abonnement)
    {
        $sql = "SELECT * from abonnements where Id_abonnement = $id_Abonnement";
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

    function updateAbonnement($abonnement, $id_abonnement)
    {
        $sql = "UPDATE abonnements SET 
                    username = :username,
                    cour = :cour,
                    id_type_abo = :type,
                    methode = :methode,
                    num_cb = :num_cb,
                    titulaire_cb = :titulaire_cb,
                    exp_cb = :exp_cb,
                    cvv_cb = :cvv_cb,
                    num_visa = :num_visa,
                    titulaire_visa = :titulaire_visa,
                    exp_visa = :exp_visa,
                    cvv_visa = :cvv_visa,
                    num_mc = :num_mc,
                    exp_mc = :exp_mc,
                    cvv_mc = :cvv_mc,
                    num_edinar = :num_edinar,
                    code_edinar = :code_edinar
                WHERE Id_abonnement = :id";

        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'username' => $abonnement->getUsername(),
                'cour' => $abonnement->getCour(),
                'type' => $abonnement->getType(),
                'methode' => $abonnement->getMethode(),
                'num_cb' => $abonnement->getNumCb(),
                'titulaire_cb' => $abonnement->getTitulaireCb(),
                'exp_cb' => $abonnement->getExpCb(),
                'cvv_cb' => $abonnement->getCvvCb(),
                'num_visa' => $abonnement->getNumVisa(),
                'titulaire_visa' => $abonnement->getTitulaireVisa(),
                'exp_visa' => $abonnement->getExpVisa(),
                'cvv_visa' => $abonnement->getCvvVisa(),
                'num_mc' => $abonnement->getNumMc(),
                'exp_mc' => $abonnement->getExpMc(),
                'cvv_mc' => $abonnement->getCvvMc(),
                'num_edinar' => $abonnement->getNumEdinar(),
                'code_edinar' => $abonnement->getCodeEdinar(),
                'id' => $id_abonnement
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }




    

} 
?>