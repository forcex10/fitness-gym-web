<?php
include "../controller/produitC.php";

$c = new produitC();
$tab = $c->listproduits();

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Produit</title>
  <link rel="stylesheet" type="text/css" href="njareb.css">
</head>
<body>

  <div class="form-container">
    <h2>Produit</h2>

    <form id="gymForm" action="" method="POST">
     
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

     
<a href="addproduit.php" id="bouton">
  <button type="submit">Ajouter Produit</button>
</a>
    </form>
  </div>
  <table>
    <tr>
      <th>Nom</th>
      <th>Description</th>
      <th>Prix</th>
      <th>Quantité</th>
      <th>Modifier</th>
      <th>Supprimer</th>
     
    </tr>
    <?php
    foreach ($tab as $produit) {
    ?>




        <tr>
            <td><?= $produit['id']; ?></td>
            <td><?= $produit["productname" ]; ?></td>
            <td><?= $produit["productdescription"]; ?></td>
            <td><?= $produit["productprice"]; ?></td>
            <td><?= $produit["productstock"]; ?></td>
            <td >
                <form method="POST" action="updateproduit.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $produit['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deleteproduit.php?id=<?php echo $produit['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>

  </table>
  
  <script src="njareb fih.js"></script>
</body>
</html>
