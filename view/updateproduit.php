<?php

include '../controller/produitC.php';
include '../model/produit.php';
include 'verif.php';
$error = "";

// create client
$produit = null;
// create an instance of the controller
$produitC = new produitC();


if (
    isset($_POST["productname"]) &&
    isset($_POST["productdescription"]) &&
    isset($_POST["productprice"]) &&
    isset($_POST["productstock"])
) {
    if (
        !empty($_POST["productname"]) &&
        !empty($_POST["productdescription"]) &&
        !empty($_POST["productprice"]) &&
        !empty($_POST["productstock"])&& validerNom($_POST["productname"]) && validerDescription($_POST["productdescription"])  && validerPrix( $_POST["productprice"],1000) && validerQuantite($_POST["productstock"], 1000) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $produit = new produit(
            null,
            $_POST["productname"],
            $_POST["productdescription"],
            $_POST["productprice"],
            $_POST["productstock"]
        );
        //var_dump($produit);
        
        $produitC->updateproduit($produit, $_POST['id']);

        header('Location:listeproduits.php');
    } else
        $error = "Missing information";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="code.css">
    
    <title>User Display</title>
</head>

<body>
   

   


    <?php
    if (isset($_POST['id'])) {
        $produit = $produitC->showproduit($_POST['id']);
        
    ?>

<form action="" method="POST" id="gymForm" >
<center>
    <h1>produit</h1>
    <h2>
    <a href="listeproduits.php">Back to list </a>
    </h2>
</center>

        <table>
        <tr>
                    <td><label for="nom">IdProduit :</label></td>
                    <td>
                        <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                        
                    </td>
                </tr>
       <tr>
                <td><label for="productname">Nom :</label></td>
                <td>
                <input type="text" id="productname" name="productname" value="<?php echo $produit['nom'] ?>" />
                <span id="erreurnom"  class="erreur" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="productdescription">Description :</label></td>
                <td>
                <input type="text" id="productdescription" name="productdescription" value="<?php echo $produit['description'] ?>" />
                <span id="erreurdescription"  class="erreur" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="productprice">Prix :</label></td>
                <td>
                <input type="text" id="productprice" name="productprice" value="<?php echo $produit['prix'] ?>" />
                <span id="erreurprice"  class="erreur" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="productstock">Quantité :</label></td>
                <td>
                <input type="text" id="productstock" name="productstock"  value="<?php echo $produit['quantite'] ?>" />
                <span id="erreurstock"  class="erreur" style="color: red"></span>

                </td>
            </tr>


            <td>
                <input type="submit" value="Save" id="saveButton" class="design10">
            </td>
            <td>
                <input type="reset" value="Reset"  id="resetButton" class="design10" onclick="effacerMessagesErreur()" >
            </td>
            <td>
            <button type="button" id="bouton"  >Verifier</button></td>
        </table>

    </form>
    <?php
    }
    ?>
    <script src="emir.js"></script>
</body>

</html>