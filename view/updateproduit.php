<?php
require_once "../controller/typeC.php";
include '../controller/produitC.php';
include '../model/produit.php';
include 'verif.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$error = "";
$typec = new typeC();
// create client
$produit = null;
$msg="";
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
) {
    if (
        !empty($_POST["productname"]) &&
        !empty($_POST["productdescription"]) &&
        !empty($_POST["productprice"]) &&  !empty($_POST["type"]) &&
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
            $_POST["productstock"],
            $_POST["type"],
            $image
        );
        //var_dump($produit);
        
        $produitC->updateproduit($produit, $_POST['id']);
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
    
    <title>User Display</title>
</head>

<body>
   

   


    <?php
    if (isset($_POST['id'])) {
        $produit = $produitC->showproduit($_POST['id']);
        $typess=$produitC->showtypes($produit['type']);
    ?>
   

<form action="" method="POST" id="gymForm"  enctype="multipart/form-data">
<input   type="hidden"   name="size"  value="1000000"    >
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
                <textarea type="text" id="productdescription" name="productdescription" > <?php echo $produit['description'] ?> </textarea>
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
            <tr>
               
                <td>
                   
                <input type="file" id="image" name="image" required>


                </td>
            </tr>
<tr>
    <td>
<label for="type">choisir un type :</label>
    </td>  
    <td>
    <select name="type" id="type">
  
   
       
            
            <option value="<?= $types['idtype'] ?>" >
                <div class="custom-option">
                    
                <span class="label">Nom :<?php echo $typess['nomtype']  ?> </span>

                    
                    <span class="separator"> || </span>
                    <span class="label">Description : <?php echo $typess['descriptiontype']  ?></span>
                 
                </div>
            </option>
        
        <?php  foreach ($type as $types) { 
            ?>
            <?php  if($types['nomtype']!=$typess['nomtype'] && $types['descriptiontype']!=$typess['descriptiontype'] ) {       ?>
            
            <option value="<?= $types['idtype'] ?>" >
                <div class="custom-option">
                    
                

                    <span class="value"><?= $types['nomtype'] ?></span>
                    <span class="separator"> || </span>
                   
                    <span class="value"><?= $types['descriptiontype'] ?></span>
                </div>
            </option>
            
           <?php }?>
        <?php } ?>
    </select>

        </td>
    </tr>

            <td>
                <input type="submit" value="Save" id="saveButton" class="design10" name="save">
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