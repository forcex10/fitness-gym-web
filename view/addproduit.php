<?php
require_once "../controller/typeC.php";
include '../controller/produitC.php';
include '../model/produit.php';
include 'verif.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$typec = new typeC();
$error = "";
$msg="";
// create produit
$produit = null;

// create an instance of the controller
$produitC = new produitC();
if(isset($_POST["save"])){
    $target = "images/" . basename($_FILES['image']['name']);
    $image=$_FILES['image']['name'];

}
if (
    isset($_POST["productname"]) &&
    isset($_POST["productdescription"]) &&
    isset($_POST["productprice"]) &&
    isset($_POST["productstock"])&&
    isset($_POST["type"])
    //isset($_POST["image"])
   
) {

   

    if (
        !empty($_POST["productname"]) && 
        !empty($_POST["productdescription"]) &&
        !empty($_POST["productprice"]) && !empty($_POST["type"]) &&
        !empty($_POST["productstock"]) && validerNom($_POST["productname"]) && validerDescription($_POST["productdescription"])  && validerPrix( $_POST["productprice"],1000) && validerQuantite($_POST["productstock"], 1000) 
    ) {
  

        $image=$_FILES['image']['name'];
        $produit = new produit(
            null,
            $_POST["productname"],
            $_POST["productdescription"],
            $_POST["productprice"],
            $_POST["productstock"],
            $_POST["type"],
            $image

          
        );
    
/*if(validerNom($_POST["productname"]) && validerDescription($_POST["productdescription"]) && validerNom($_POST["productname"]) && validerPrix( $_POST["productprice"],1000) && validerQuantite($_POST["productstock"], 1000)  ){*/

        $produitC->addproduit($produit);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
$msg="Image uploaded successfully";

        }
        else{
            $msg="the was a problem uploading image". $_FILES['image']['error'];
        }
        echo "Debug Info:";
var_dump($produitC); // Vérifiez si les données sont correctes
var_dump($msg); // Affichez le message d'erreur

        header('Location:listeproduits.php');  
        exit;
      
    } else
        $error = "Missing information";
       
}
$type = $typec->affichertype();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="code.css">
  
   
    <title>Produit </title>
</head>

<body>
    
    

  
    

    <form action="" method="POST" id="gymForm" enctype="multipart/form-data" >
    <input   type="hidden"   name="size"  value="1000000"    >
    <center>
    <h1>produit</h1>
    <h2>
    <a href="listeproduits.php">Back to list </a>
    </h2>
</center>
        <table>
            <tr>
                <td><label for="productname">Nom :</label></td>
                <td>
                <input type="text" id="productname" name="productname" required placeholder="nom">
                <span id="erreurnom" class="erreur" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="productdescription">Description :</label></td>
                <td>
                <textarea type="text" id="productdescription" name="productdescription" required placeholder="description"> </textarea>
                <span id="erreurdescription" class="erreur" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="productprice">Prix :</label></td>
                <td>
                <input type="text" id="productprice" name="productprice" required placeholder="prix">
                <span id="erreurprice" class="erreur" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="productstock">Quantité :</label></td>
                <td>
                <input type="text" id="productstock" name="productstock" required placeholder="quantite">
                <span id="erreurstock" class="erreur" style="color: red"></span>

                </td>
            </tr>
            <tr>
               
                <td>
                   
                <input type="file" id="image" name="image" required>


                </td>
            </tr>
            


            <td>
                <input type="submit" id="saveButton" class="design10" value="Save" name="save">
            </td>
            <td>
            <input type="reset" id="resetButton"
            class="design10" value="Reset" onclick="effacerMessagesErreur()">
            </td>
            <label for="type">choisir un type :</label>
    <select name="type" id="type">
        <?php foreach ($type as $types) { ?>
            <option value="<?= $types['idtype'] ?>">
                <div class="custom-option">
                    <span class="label">Nom :</span>
                    <span class="value"><?= $types['nomtype'] ?></span>
                    
                </div>
            </option>
        <?php } ?>
    </select>
            <td>
            <button type="button" id="bouton" >Verifier</button></td>

        </table>
       
    </form>
    <?php if (!empty($msg)): ?>
        <div><?php echo $msg; ?></div>
    <?php endif; ?>
    <script src="emir.js"></script>
</body>

</html>