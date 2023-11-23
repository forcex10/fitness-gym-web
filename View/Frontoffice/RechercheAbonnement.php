<?php
      include "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
      $TypeAbonnementC=new TypeAbonnementC();
      if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['type']) && isset($_POST['search']) ) {
            $id_type_abo=$_POST['type'];
            $liste=$TypeAbonnementC->afficherAbonnement($id_type_abo);

        }
      }
      $TypeAbonnement=$TypeAbonnementC->listTypeAbonnement();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Recherche Abonnement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
        }

        select {
            padding: 8px;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .no-result {
            text-align: center;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Recherche d'abonnement par type d'abonnement</h1>
    <form action="" method="POST">
        <label for="type">Type d'Abonnement :</label>
        <select id="type" name="type">
    <?php
    foreach ($TypeAbonnement as $l) {
        $selected = (isset($_POST['type']) && $_POST['type'] == $l['id_type_abo']) ? 'selected' : '';
        echo '<option value="' . $l['id_type_abo'] . '" ' . $selected . '>';
        echo $l['nom'] . ' ( ' . $l['duree'] . ' mois ' . $l['prix'] . ' DT )</option>';
    }
    ?>
</select>

        <input type="submit" value="Rechercher" name="search">
    </form>

    <?php
    if (isset($liste)) {
        if (count($liste) > 0) {
            ?>
            <h2>Résultats de la recherche</h2>
            <ul>
                <?php
                foreach ($liste as $l) {
                    echo '<li> Id Abonnement: ' . $l['Id_abonnement'] . ' - Username: ' . $l['username'] . ' - Cour: ' . $l['cour'] . ' - Methode Payment: ' . $l['methode'] . '</li>';
                }
                ?>
            </ul>
            <?php
        } else {
            echo '<p class="no-result">Aucun abonnement trouvé pour ce type.</p>';
        }
    }
    ?>
</body>
</html>
