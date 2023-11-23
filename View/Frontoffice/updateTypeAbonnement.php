<?php
include "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
include "C:/xampp/htdocs/fitness-gym-web/Model/TypeAbonnement.php";
$error = "";
$abonnementC = new TypeAbonnementC();

$abonnement = null;

if (
    isset($_POST["nom"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["prix"]) 
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["prix"]) 
    ) {
        $abonnement=new TypeAbonnement(null,$_POST['nom'],$_POST['duree'],$_POST['prix']);

        $abonnementC->updateTypeAbonnement($abonnement,$_POST['id_type_abo']);

        header('Location:listeTypeAbonnement.php');
    } else {
        $error = "Des informations sont manquantes";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour type Abonnement</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background: url("client.png") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h2 {
            text-align: center;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #555;
        }
        .champ_carte {
            display: none;
        }
        .back-button {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <a href="listeTypeAbonnement.php" class="back-button">Retour</a>
    <?php
    $abonnement= $abonnementC->showTypeAbonnement($_POST['id_type_abo']);
    ?>
    <div class="container">
        <h2>Formulaire de Mise à Jour de Type Abonnement</h2>
        <form action="" method="POST" onsubmit="return validerFormulaire()">
        <label for="id_type_abo"> Id_Type_Abonnement : </label>
        <input type="text" id="id_type_abo" name="id_type_abo" value="<?php echo $_POST['id_type_abo'] ?>" readonly />
        <label for="nom"> Nom : </label>
        <input type="text" id="nom" name="nom" value="<?php echo $abonnement['nom'] ;?>" />
        <label for="duree"> Duree : </label>
        <input type="text" id="duree" name="duree" value="<?php echo $abonnement['duree'] ;?>" />
        <label for="prix"> Prix : </label>
        <input type="text" id="prix" name="prix" value="<?php echo $abonnement['prix'] ;?>" />
        <input type="submit" value="SAVE">
        </form>
    </div>

    <script>
        function validerFormulaire() {

var nom = document.getElementById("nom").value;
var duree = document.getElementById("duree").value;
var prix = document.getElementById("prix").value;

if (nom === "" || !estUneChaineDeLettres(nom)) {
    alert("Veuillez saisir un nom valide");
    return false;
}
if(duree===""||!estEntier(duree)){
    alert("Veuillez saisir une duree valide");
    return false;

}
if(prix===""||!estEntier(prix)){
    alert("Veuillez saisir un prix valide");
    return false;

}

return true; // Envoi du formulaire si tout est correct
}

function estEntier(chaine) {
        return /^\d+$/.test(chaine);
    }
    function estUneChaineDeLettres(chaine) {
    return /^[a-zA-Z]+$/.test(chaine);
}
    </script>
</body>

</html>
