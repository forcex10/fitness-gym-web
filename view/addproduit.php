<?php

include '../controller/produitC.php';
include '../model/produit.php';
require_once "../controller/typeC.php";
$typec = new typeC();

$error = "";

// create product
$produit = null;

// create an instance of the controller
$produitC = new produitC();
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
        !empty($_POST["productprice"]) &&
        !empty($_POST["productstock"])&&
        !empty($_POST["type"])
    ) {
        $produit = new produit(
            null,
            $_POST["productname"],
            $_POST["productdescription"],
            $_POST["productprice"],
            $_POST["productstock"],
            $_POST["type"]
            
        );
        $produitC->addproduit($produit);
        header('Location:listproduits.php');
    } else {
        $error = "Missing information";
    }
}
$type = $typec->affichertype();
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Produit</title>
  <link rel="stylesheet" type="text/css" href="njareb.css">
</head>
<body>
<a href="listproduits.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

  <div class="form-container">
    <h2>Produit</h2>

    <form id="gymForm" action="addproduit.php" method="POST">
    <label for="productname">Nom :</label>
    <input type="text" id="productname" name="productname" required>
    <span id="erreurnom" style="color: red"></span>

    <label for="productdescription">Description :</label>
    <input type="text" id="productdescription" name="productdescription" required>
    <span id="erreurdescription" style="color: red"></span>

    <label for="productprice">Prix :</label>
    <input type="text" id="productprice" name="productprice" required>
    <span id="erreurprice" style="color: red"></span>

    <label for="productstock">Quantité :</label>
    <input type="text" id="productstock" name="productstock" required>
    <span id="erreurstock" style="color: red"></span>
    <label for="type">choisir un type :</label>
    <select name="type" id="type">
        <?php foreach ($type as $types) { ?>
            <option value="<?= $types['idtype'] ?>">
                <div class="custom-option">
                    <span class="label">Nom :</span>
                    <span class="value"><?= $types['nomtype'] ?></span>
                    <span class="separator"> || </span>
                    <span class="label">Description :</span>
                    <span class="value"><?= $types['descriptiontype'] ?></span>
                </div>
            </option>
        <?php } ?>
    </select>

    <button type="submit" id="bouton">Ajouter Produit</button>
</form>
  
  <script src="njareb fih.js"></script>
</body>
</html>
