<?php 
require_once "../controller/PostC.php";
$postc = new PostC();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["post"]) && isset($_POST["search"])) {
        $idpost = $_POST["post"];
        $list = $postc->affichercom($idpost);
    }
}

$post = $postc->afficherpost();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche des commentaires</title>
    <style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f9f9f9; /* Light gray background */
    margin: 0;
    padding: 0;
    color: #333;
}

header {
        background-color: #ccc; /* Header en gris */
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
        color: #ff0000; /* Changement de la couleur des h2 en rouge */
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
        color: #ff0000; /* Changement de la couleur des labels en rouge */
        display: block;
        margin-bottom: 10px;
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
        background-color: #ff0000; /* Changement de la couleur des boutons en rouge */
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #cc0000; /* Changement de la couleur au survol en rouge légèrement plus sombre */
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
        background-color: #ff0000; /* Changement de la couleur des headers de colonnes en rouge */
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

   
    </style>
</head>

<body>
    <header>
        <h1>commentaires </h1>
        <a href="listPost.php">Retourner à la liste des posts</a>

    </header>

    <form action="" method="POST">
    <label for="post">Sélectionner un post :</label>
    <select name="post" id="post">
        <?php foreach ($post as $posts) { ?>
            <option value="<?= $posts['idpost'] ?>" <?php if (isset($_POST['post']) && $_POST['post'] == $posts['idpost']) echo 'selected'; ?>>
                <div class="custom-option">
                    <span class="label">Nom :</span>
                    <span class="value"><?= $posts['nom'] ?></span>
                    <span class="separator"> || </span>
                    <span class="label">prenom :</span>
                    <span class="value"><?= $posts['prenom'] ?></span>
                    <span class="separator"> || </span>
                    <span class="label">post:</span>
                    <span class="value"><?= $posts['contenu'] ?></span>
                    
                </div>
            </option>
        <?php } ?>
    </select>
    <input type="submit" value="Rechercher" name="search">
    
</form>

    <?php if (isset($list)) { ?>
        <h2>commentaires correspendants au post:</h2>
        <table>
            <tr>
                <th>Nom</th>
                <th>prenom</th>
                <th>commentaire</th>
            </tr>
            <?php foreach ($list as $commentaire) { ?>
                <tr>
                    <td><?= $commentaire['nom'] ?></td>
                    <td><?= $commentaire['prenom'] ?></td>
                    <td><?= $commentaire['contenu'] ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</body>

</html>