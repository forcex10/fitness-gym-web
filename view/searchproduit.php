<?php 
require_once "../controller/typeC.php";
$typec = new typeC();
$type = $typec->affichertype();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["type"]) && isset($_POST["search"])) {
      
        $idtype = $_POST["type"];
        $list = $typec->afficherproduits($idtype);
    }
}


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

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            width: 200px;
            margin: 15px;
            border: 2px solid #3498db;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.1);
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .card-content {
            padding: 10px;
            text-align: center;
        }

        .product-name {
            font-weight: bold;
            color: #3498db;
            margin-bottom: 5px;
        }

        .product-description {
            color: #555;
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
                <option value="<?= $types['idtype'] ?>"  >
                    <div class="custom-option">
                        <span class="label">Nom :</span>
                        <span class="value"><?= $types['nomtype'] ?></span>
                        
                    </div>
                </option>
            <?php } ?>
        </select>
        <input type="submit" value="Rechercher" name="search"         >
    </form>

    <?php if (isset($list)) { ?>
        <h2>Produits correspondants au type sélectionné :</h2>
        <div class="card-container">
            <?php foreach ($list as $produit) { ?>
                <div class="card">
                <a href="details_produit.php?id=<?= $produit['id'] ?>">
    <img src="images/<?= $produit['image'] ?>" alt="Produit Image">
</a>
                    <div class="card-content">
                        <p class="product-name"><?= $produit['nom'] ?></p>
                        
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</body>

</html>
