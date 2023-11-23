<?php
require_once "../controller/type_courC.php";
$coutypeC = new courTypeC();

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom_type']) && isset($_POST['search'])) {
        $idtype = $_POST['nom_type'];
        $list = $coutypeC->afficheCour($idtype);
    }
}
$types = $coutypeC->afficheType();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'albums</title>
    <link rel="stylesheet" href="searchCours.css"> <!-- Include your CSS file here -->
</head>

<body>

    <h1>Recherche d'albums par genre</h1>

    <form action="" method="POST" class="custom-form">
        <label for="nom_type" class="custom-label">Sélectionnez un genre :</label>
        <select name="nom_type" id="genre" class="custom-select">
            <?php
            foreach ($types as $genre) {
                echo '<option value="' . $genre['id'] . '">' . $genre['nom_type'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Rechercher" name="search" class="custom-submit">
    </form>

    <?php if (isset($list)) { ?>
        <h2 class="custom-h2">Albums correspondants au genre sélectionné :</h2>
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>images</th>
                    <th>Description</th>
                    <th>Enseignant</th>
                    <th>Horaire</th>

                </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $cour) { ?>
    <tr>
        <td><?= $cour['nom'] ?></td>
        <td><img src="images/<?= $cour['image'] ?>" alt="Produit Image" class="product-image" style="width: 100px; height: 100px; border: 2px solid #3498db;"></td>
        <td><?= $cour['description'] ?></td>
        <td><?= $cour['enseignant'] ?></td>
        <td><?= $cour['horaire'] ?></td>
    </tr>
<?php } ?>
            </tbody>
        </table>
    <?php } ?>

</body>

</html>
