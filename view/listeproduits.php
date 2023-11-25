<?php
include "../controller/produitC.php";
$c = new produitC();

// Fonction pour récupérer les produits en fonction du nom de recherche



/*if(isset($_GET['search']) && empty($_GET['search']) ){
    $tab = $c->listproduits();

}*/
if(isset($_POST['increase']) && isset($_POST['quantite']) && isset($_POST['id'])){
    $quantite = $_POST['quantite'] + 1; // Line 14
    if( $quantite<=100){
    $c->ajouterquantite($_POST['id'], $quantite);}
    else{
        $quantite=100;
    } 
}
if(isset($_POST['decrease']) && isset($_POST['quantite']) && isset($_POST['id'])){

    $quantite = $_POST['quantite']-1; // Line 14
    if($quantite==0){
        $c->deleteproduit($_POST['id']);
    }
    $c->ajouterquantite($_POST['id'], $quantite); // Line 15
}

if (isset($_GET['search'])/*&& !empty($_GET['search'])*/ ) {

    $searchTerm = $_GET['search'];
    $tab = $c->searchProducts($searchTerm);
}
if (isset($_GET['sortPrice'])) {
    $tab = $c->trierParPrix();

}
$tab = $c->listproduits();
?>

<head>
    <link rel="stylesheet" type="text/css" href="liste.css">
</head>

<center>
    <h1>List of produits</h1>
    <form method="GET">
        <input type="text" id="search" name="search" placeholder="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit" name="sortPrice">Trier par Prix</button>
        <input type="submit" value="Search">
    </form>
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

    <tbody id="tbody">
        <?php
        foreach ($tab as $produit) {
        ?>
        <tr>
            <td><?= $produit['id']; ?></td>
            <td><?= $produit['nom']; ?></td>
            <td><?= $produit['description']; ?></td>
            <td><?= $produit['prix']; ?></td>
            <td>
        <?= $produit['quantite']; ?>
        <form method="POST" action="">
            <input type="hidden" value="<?= $produit['id']; ?>" name="id">
            <input type="hidden" value="<?= $produit['quantite']; ?>" name="quantite">
            <button type="submit" name="increase">+</button>
            <button type="submit" name="decrease">-</button>
        </form>
    </td>
            <td><img src="images/<?= $produit['image'] ?>" alt="Produit Image" class="product-image" style="width: 100px; height: 100px; border: 2px solid #3498db;"></td>
            <td align="center">
                <form method="POST" action="updateproduit.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?= $produit['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deleteproduit.php?id=<?= $produit['id']; ?>" >Delete</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>





