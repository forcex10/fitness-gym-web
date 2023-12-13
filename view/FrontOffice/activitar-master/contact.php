<?php
session_start();

include_once '../../../controller/reclamationC.php';
include_once '../../../model/reclamation.php';
include_once 'veriff.php';

$reclamationC = new reclamationC();
if (
  
    isset($_POST["message"]) 
) {
    if (
        
         !empty($_POST["message"])  
    ) {
        $reclamation = new reclamation(
            null,
            $_SESSION['nom'],
            $_SESSION["email"],
            $_POST["message"],
           
        );
    
/*if(validerNom($_POST["productname"]) && validerDescription($_POST["productdescription"]) && validerNom($_POST["productname"]) && validerPrix( $_POST["productprice"],1000) && validerQuantite($_POST["productstock"], 1000)  ){*/

    $reclamationC->addreclamation($reclamation);

        
        header('Location:contact.html');
    } else
        $error = "Missing information";
}


?>

