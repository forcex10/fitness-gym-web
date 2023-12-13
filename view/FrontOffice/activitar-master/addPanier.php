<?php
session_start();
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/PanierC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/produitC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Model/Panier.php";

$panierC=new PanierC();
$produitC=new produitC();
$id_client=$_SESSION['id'];
$id_produit=$_POST['id_produit'];
$quantite=$_POST['quantitee'];
$produit=$produitC->showproduit($id_produit);
var_dump($produit);
if(isset($id_produit)){
  if(!empty($id_produit)){
          $panier=$panierC->showPanier($id_client,$id_produit);
          if(!isset($panier) || empty($panier))
          {
            if( $produit['quantite']>=$quantite){
            $Npanier=new Panier(null,$id_client,$id_produit,$quantite,$quantite*$produit['prix']);
            $produit['quantite']-=$quantite;
            $produitC->updateproduit2($produit,$id_produit);
            $panierC->addPanier($Npanier);}
          }
          else 
          {
              if( $produit['quantite']>=$quantite){
              $Npanier=new Panier($panier['id_panier'],$id_client,$id_produit,$quantite+$panier['quantite'],($quantite+$panier['quantite'])*$produit['prix']);
              $produit['quantite']-=$quantite;
              $produitC->updateproduit2($produit,$id_produit);
              $panierC->updatePanier($Npanier, $panier['id_panier']);
              }

          }

  }
}
header('Location:index.php');

?>
