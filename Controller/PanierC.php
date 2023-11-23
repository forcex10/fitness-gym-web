<?php
require "C:/xampp/htdocs/fitness-gym-web/config.php" ;
class PanierC
{
    public function listPanier()
    {
        $sql = "SELECT * FROM panier";
        $db = config::getConnexion();
        try {
                    $liste =$db->query($sql);
                    return $liste;
            } 
        catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deletePanier($ide)
    {
        $sql = "DELETE FROM panier WHERE id_panier = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);
        try {
            $req->execute();
            } catch (Exception $e) {
                die('Error:' . $e->getMessage());
            }
    }

    public function addPanier($panier)
    {
        $sql = "INSERT INTO panier
        VALUES (NULL,:id_produit,:quantite)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
            'id_produit'=> $panier->getIdProduit(),
            'quantite' => $panier->getQuantite(),
        ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            }
    }

    public function afficheProduit($id_produit)
    {
        try {
            $pdo=config::getConnexion();
            $query=$pdo->prepare("SELECT * FROM produit WHERE id_produit=:id");
            $query->execute(['id'=>$id_produit]);
            return $query->fetchAll();

        }catch(PDOException $e ){ echo $e->getMessage()}
    }

    /*
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
                    type = :type,
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
    }*/

    

} 
?>