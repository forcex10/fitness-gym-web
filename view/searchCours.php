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
    <title>Recherche du cour</title>
    <link rel="stylesheet" href="searchCoursess.css"> <!-- Include your CSS file here -->
</head>

<body>

    <h1>    Welcome To Our Courses</h1>

    <form action="" method="POST" class="custom-form">
        <label for="nom_type" style >Sélectionnez un type :</label>
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
    <h2 class="custom-h2">Albums correspondants au type sélectionné :</h2>
    <div class="card-container">
        <?php foreach ($list as $cour) { ?>
            <div class="custom-card" onclick="showDetails(<?php echo $cour['id']; ?>)">
                <img src="images/<?= $cour['image'] ?>" alt="Produit Image" class="product-image">
                <h3><?= $cour['nom'] ?></h3>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<script>
    function showDetails(id) {
        window.location.href = 'affichagedetailscour.php?id=' + id;
    }
</script>

</body>

</html>
