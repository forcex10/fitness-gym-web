<?php

include '../controller/typeC.php';
include '../model/type.php';
include 'verif.php';

$error = "";

// create produit
$type = null;

// create an instance of the controller
$typeC = new typeC();
if (
    isset($_POST["typename"]) &&
    isset($_POST["typedescription"]) 
) {
    if (
        !empty($_POST["typename"]) &&
        !empty($_POST["typedescription"])  && validerNom($_POST["typename"]) && validerDescription($_POST["typedescription"])   
    ) {
        $type = new type(
            null,
            $_POST["typename"],
            $_POST["typedescription"],
           
        );
    
/*if(validerNom($_POST["productname"]) && validerDescription($_POST["productdescription"]) && validerNom($_POST["productname"]) && validerPrix( $_POST["productprice"],1000) && validerQuantite($_POST["productstock"], 1000)  ){*/

        $typeC->addtype($type);

        
        header('Location:listetype.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="type.css">
  
   
    <title>Type </title>
</head>

<body>
    
    

  
    

    <form action="" method="POST" id="gymForm1" >
    <center>
    <h1>type</h1>
    <h2>
    <a href="listetype.php">Back to list </a>
    </h2>
</center>
        <table>
            <tr>
                <td><label for="typename">Nom_type :</label></td>
                <td>
                <input type="text" id="typename" name="typename" required>
                <span id="erreurnomtype" class="erreurtype" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="typedescription">Description_type :</label></td>
                <td>
                <textarea  id="typedescription" name="typedescription" required>  </textarea>
                <span id="erreurdescriptiontype" class="erreurtype" style="color: red"></span>
                </td>
            </tr>
            
            <td>
                <input type="submit" id="saveButton1" class="design11" value="Save">
            </td>
            <td>
            <input type="reset" id="resetButton1"
            class="design11" value="Reset" onclick="effacerMessagesErreurtype()">
            </td>
            <td>
            <button type="button" id="bouton1" >Verifier</button></td>

        </table>
       
    </form>
    <script src="njareb.js"></script>
</body>

</html>