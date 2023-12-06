<?php
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/PanierC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/produitC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Model/Panier.php";
//id du client a faire
//$id_produit=$_GET['id_produit'];
//$quantite=$_GET['quantite'];
$panierC=new PanierC();
$produitC=new produitC();
$id_client=6;
$id_produit=2;
$quantite=1;
$produit=$produitC->showproduit($id_produit);
if(isset($id_produit)){
  if(!empty($id_produit)){
          $panier=$panierC->showPanier($id_client,$id_produit);
          if(!isset($panier) || empty($panier))
          {
            if( $produit['quantite_produit']>=$quantite){
            $Npanier=new Panier(null,$id_client,$id_produit,$quantite,$quantite*$produit['prix']);
            $produit['quantite_produit']-=$quantite;
            $produitC->updateproduit($produit,$id_produit);
            $panierC->addPanier($Npanier);}
          }
          else 
          {
              if( $produit['quantite_produit']>=$quantite){
              $Npanier=new Panier($panier['id_panier'],$id_client,$id_produit,$quantite+$panier['quantite'],($quantite+$panier['quantite'])*$produit['prix']);
              $produit['quantite_produit']-=$quantite;
              $produitC->updateproduit($produit,$id_produit);
              $panierC->updatePanier($Npanier, $panier['id_panier']);
              }

          }

  }
}
header('Location:index.php');

?>
