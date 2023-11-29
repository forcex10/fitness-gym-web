<?php

include '../controller/produitC.php';
include '../model/produit.php';
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
        !empty($_POST["productstock"])
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
        var_dump($produit);
        
        $produitC->updateproduit($produit, $_POST['id']);

        header('Location:listproduits.php');
    } else
        $error = "Missing information";
}



?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Produit</title>
  <link rel="stylesheet" type="text/css" href="njareb.css">
</head>
<body>
<button><a href="listproduits.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <?php
    if (isset($_POST['id'])) {
        $produit = $produitC->showproduit($_POST['id']);
        
    ?>

  <div class="form-container">
    <h2>Produit</h2>

    <form id="gymForm" action="" method="POST">
     
      <label for="productname">Nom :</label>
<input type="text" id="productname" name="productname" value="<?php echo $produit["productname" ] ?>" required>
<span id="erreurnom" style="color: red"></span>

<label for="productdescription">Description :</label>
<input type="text" id="productdescription" name="productdescription" value="<?php echo $produit["productdescription"] ?>" required>
<span id="erreurdescription" style="color: red"></span>

<label for="productprice">Prix :</label>
<input type="text" id="productprice" name="productprice" value="<?php echo $produit["productprice"] ?>" required>
<span id="erreurprice" style="color: red"></span>

<label for="productstock">Quantité :</label>
<input type="text" id="productstock" name="productstock" value="<?php echo $produit["productstock"] ?>"  required>
<span id="erreurstock" style="color: red"></span>

     
      <button type="submit" id="bouton" >Ajouter Produit</button>
    </form>
    <?php
    }
    ?>
  
  <script src="njareb fih.js"></script>
</body>
</html>

