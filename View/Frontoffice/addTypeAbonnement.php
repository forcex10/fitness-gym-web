<?php
include "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
include "C:/xampp/htdocs/fitness-gym-web/Model/TypeAbonnement.php";
$abonnementC=new TypeAbonnementC();
if (isset($_POST['nom']) && isset($_POST['duree']) && isset($_POST['prix']))
{
    if(!empty($_POST['nom']) && !empty($_POST['duree']) && !empty($_POST['prix']))
    {
        $abonnement=new TypeAbonnement(null,$_POST['nom'],$_POST['duree'],$_POST['prix']);
        $abonnementC->addTypeAbonnement($abonnement);
        header('Location:listeTypeAbonnement.php');

    }
    
  
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout Type Abonnement</title>
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
    </style>
</head>
<body>
  <div class="container">
      <h2>Formulaire d'ajout type abonnement</h2>
      <form action="" method="POST" onsubmit="return validerFormulaire()">
          <label for="nom">Nom :</label>
          <input type="text" id="nom" name="nom">
          <label for="duree">Duree :</label>
          <input type="text" id="duree" name="duree">
          <label for="prix">prix :</label>
          <input type="text" id="prix" name="prix">

          <input type="submit" value="Ajouter">
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
