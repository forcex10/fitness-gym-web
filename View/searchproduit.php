<?php 
require_once "../controller/typeC.php";
$typec = new typeC();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["type"]) && isset($_POST["search"])) {
        $idtype = $_POST["type"];
        $list = $typec->afficherproduits($idtype);
    }
}

$type = $typec->affichertype();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche des produits</title>
    <style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9; /* Light gray background */
    margin: 0;
    padding: 0;
    color: #333;
}

header {
    background-color: #3498db; /* Blue color for the header */
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

h1 {
    color: #000; /* Black color for h1 */
    text-align: center;
    margin-top: 30px;
}

h2 {
    color: #3498db; /* Blue color for h2 */
    text-align: center;
    margin-top: 30px;
}

p, label {
    text-align: center;
    margin-bottom: 30px;
    color: #555;
}

p.intro {
    color: #000; /* Black color for the specified paragraph */
    font-size: 50px; /* Larger font size */
}

form {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    color: #3498db; /* Blue color for the label */
}

select {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #3498db; /* Blue border color */
    border-radius: 8px;
    box-sizing: border-box;
    background-color: #ecf0f1;
    color: #555;
    transition: border-color 0.3s ease;
}

select:hover, select:focus {
    border-color: #2980b9; /* Darker blue on hover/focus */
}

input[type="submit"] {
    background-color: #3498db; /* Blue color for the submit button */
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9; /* Darker blue on hover */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 15px;
    text-align: center;
    background-color: #fff;
}

th {
    background-color: #3498db; /* Blue color for table header */
    color: #fff;
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.custom-option {
        display: flex;
        flex-direction: column;
        padding: 10px;
        border: 1px solid #3498db;
        margin-bottom: 5px;
        background-color: #f9f9f9;
        transition: background-color 0.3s;
    }

    .custom-option:hover {
        background-color: #e0e0e0;
    }

    .custom-option span {
        margin-bottom: 5px;
    }

    .custom-option .label {
        font-weight: bold;
        color: #3498db;
        font-size: 14px;
    }

    .custom-option .value {
        color: #333;
        font-size: 16px;
    }

    .custom-option .separator {
        color: #777;
    }
    .product-image {
    max-width: 100px; /* Ajustez la largeur maximale de l'image */
    height: auto; /* Pour maintenir les proportions de l'image */
    border: 2px solid #3498db; /* Couleur de la bordure */
    border-radius: 5px; /* Coins arrondis */
    display: block;
    margin: 0 auto; /* Centrez l'image dans la cellule */
}

   
    </style>
</head>

<body>
    <header>
        <h1>Bienvenue sur notre Produits !</h1>
        <p>Explorez notre gamme de produits de qualité pour tous les passionnés de fitness.</p>

    </header>

    <form action="" method="POST">
    <label for="type">Sélectionner un type :</label>
    <select name="type" id="type">
        <?php foreach ($type as $types) { ?>
            <option value="<?= $types['idtype'] ?>" <?php if (isset($_POST['type']) && $_POST['type'] == $types['idtype']) echo 'selected'; ?>>
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
    <input type="submit" value="Rechercher" name="search">
    
</form>

    <?php if (isset($list)) { ?>
        <h2>Produits correspondants au type sélectionné :</h2>
        <table>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantité</th>
            </tr>
            <?php foreach ($list as $produit) { ?>
                <tr>
                    <td><img src="images/<?= $produit['image'] ?>" alt="Produit Image"  class="product-image"></td>
                    <td><?= $produit['nom'] ?></td>
                    <td><?= $produit['description'] ?></td>
                    <td><?= $produit['prix'] ?>dt</td>
                    <td><?= $produit['quantite'] ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</body>

</html>






