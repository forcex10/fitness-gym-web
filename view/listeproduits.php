<?php
include "../controller/produitC.php";
$c = new produitC();
$tab = $c->listproduits();

?>
<head> 
<link rel="stylesheet" type="text/css" href="code1.css">

</head>

<center>
    <h1>List of produits</h1>
    <h2>
        <a href="addproduit.php">Add produit</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Id produit</th>
        <th>Nom</th>
        <th>Desciption</th>
        <th>Prix</th>
        <th>Quantite</th>
        <th>Image</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $produit) {
    ?>




        <tr>
            <td><?= $produit['id']; ?></td>
            <td><?= $produit['nom']; ?></td>
            <td><?= $produit['description']; ?></td>
            <td><?= $produit['prix']; ?></td>
            <td><?= $produit['quantite']; ?></td>
            <td><img src="images/<?= $produit['image'] ?>" alt="Produit Image" class="product-image" style="width: 100px; height: 100px; border: 2px solid #3498db;"></td>

            <td align="center">
                <form method="POST" action="updateproduit.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $produit['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deleteproduit.php?id=<?php echo $produit['id']; ?>" >Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>