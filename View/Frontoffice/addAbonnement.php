<?php
include "C:/xampp/htdocs/fitness-gym-web/Controller/AbonnementC.php";
include "C:/xampp/htdocs/fitness-gym-web/Model/Abonnement.php";
$abonnementC=new AbonnementC();
if (isset($_POST['username']) && isset($_POST['cour']) && isset($_POST['type']) && isset($_POST['methode']))
{
    if(!empty($_POST['username']) && !empty($_POST['cour']) && !empty($_POST['type']) && !empty($_POST['methode']))
    {
        $methode=$_POST['methode'];
        var_dump($methode);
        if($methode==='cb')
        {
            $abonnement=new Abonnement(null,$_POST['username'],$_POST['cour'],$_POST['type'],$_POST['methode'],$_POST['num_cb'],$_POST['titulaire_cb'],$_POST['exp_cb'],$_POST['cvv_cb'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

        }

        else if($methode==='visa')
        {
            $abonnement=new Abonnement(null,$_POST['username'],$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,$_POST['num_visa'],$_POST['titulaire_visa'],$_POST['exp_visa'],$_POST['cvv_visa'],NULL,NULL,NULL,NULL,NULL);

        }

        else if($methode==='mc')
        {
            $abonnement=new Abonnement(null,$_POST['username'],$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['num_mc'],$_POST['exp_mc'],$_POST['cvv_mc'],NULL,NULL);

        }
        else 
        {
            $abonnement=new Abonnement(null,$_POST['username'],$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['num_edinar'],$_POST['code_edinar']);


        }
        
        $abonnementC->addAbonnement($abonnement);
        header('Location:listeAbonnement.php');

    }
    
  
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'Abonnement</title>
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
    <script>
        function afficherChampsCarte() {
            var methode = document.getElementById("methode").value;
            var champsCarte = document.querySelectorAll(".champ_carte");

            champsCarte.forEach(function(champ) {
                champ.style.display = "none";
            });

            if (methode === "cb") {
                document.getElementById("champ_cb").style.display = "block";
            } else if (methode === "visa") {
                document.getElementById("champ_visa").style.display = "block";
            } else if (methode === "mc") {
                document.getElementById("champ_mc").style.display = "block";
            }
            else if (methode === "edinar") {
                document.getElementById("champ_edinar").style.display = "block";
            }
            
            
        }
    </script>
</head>
<body>
  <div class="container">
      <h2>Formulaire d'Abonnement</h2>
      <form action="" method="POST" onsubmit="return validerFormulaire()">
          <label for="username">Username :</label>
          <input type="text" id="username" name="username">

         
          <label for="cour">Cour :</label>
          <select id="cour" name="cour">
              <option value="boxe">boxe </option>
              <option value="musculation">musculation</option>
              <option value="natation">natation</option>
              <option value="gymnastic">gymnastic </option>
          </select>

          <label for="type">Type d'Abonnement :</label>
          <select id="type" name="type">
              <option value="mensuel">1 mois (80dt) </option>
              <option value="trimestriel">3 mois (220dt)</option>
              <option value="semestriel">6 mois (400 dt) </option>
              <option value="annuel">1 an (700 dt) </option>
          </select>


          <label for="methode">Méthode :</label>
          <select id="methode" name="methode" onchange="afficherChampsCarte()">
              <option value="none">None</option>
              <option value="cb">Carte bancaire</option>
              <option value="visa">Carte VISA</option>
              <option value="mc">Master Card</option>
              <option value="edinar">e-DINAR</option>
          </select>

          <div id="champ_cb" class="champ_carte">
              <label for="num_cb">Numéro de Carte :</label>
              <input type="text" id="num_cb" name="num_cb">
              <label for="titulaire_cb">Titulaire de la Carte:</label>
              <input type="text" id="titulaire_cb" name="titulaire_cb">
              <label for="exp_cb">Date d'expiration :</label>
              <input type="text" id="exp_cb" name="exp_cb">
              <label for="cvv_cb">Code CVV :</label>
              <input type="text" id="cvv_cb" name="cvv_cb">
          </div>

          <div id="champ_visa" class="champ_carte">
                <label for="num_visa">Numéro de Carte Visa :</label>
                <input type="text" id="num_visa" name="num_visa">
            
                <label for="titulaire_visa">Titulaire de la Carte Visa :</label>
                <input type="text" id="titulaire_visa" name="titulaire_visa">
            
                <label for="exp_visa">Date d'expiration Visa (MM/AA) :</label>
                <input type="text" id="exp_visa" name="exp_visa">
            
                <label for="cvv_visa">Code de Sécurité (CVV) :</label>
                <input type="text" id="cvv_visa" name="cvv_visa">
          </div>

          <div id="champ_mc" class="champ_carte">
            <label for="num_mc">Numéro de la Master Carte:</label>
            <input type="text" id="num_mc" name="num_mc">
        
            <label for="exp_mc">Date d'expiration Master Carte(MM/AA) :</label>
            <input type="text" id="exp_mc" name="exp_mc">
        
            <label for="cvv_mc">Code de Sécurité (CVV) :</label>
            <input type="text" id="cvv_mc" name="cvv_mc">
          </div>

          <div id="champ_edinar" class="champ_carte">
            <label for="num_edinar">Numero de la carte e-dinar:</label>
            <input type="text" id="num_edinar" name="num_edinar">
        
            <label for="code_edinar">Code secret :</label>
            <input type="text" id="code_edinar" name="code_edinar">
        
         </div>

          <input type="submit" value="S'abonner">
      </form>
  </div>
  <script>
    function validerFormulaire() {
        var methode = document.getElementById("methode").value;
        var champsCarte = document.querySelectorAll(".champ_carte");

        // Vérification si la méthode de paiement est sélectionnée
        if (methode === "none") {
            alert("Veuillez sélectionner une méthode de paiement");
            return false; // Empêche l'envoi du formulaire si la méthode n'est pas choisie
        }

        // Vérification des champs selon la méthode de paiement sélectionnée
        if (methode === "cb") {
            var num_cb = document.getElementById("num_cb").value;
            var titulaire_cb = document.getElementById("titulaire_cb").value;
            var exp_cb = document.getElementById("exp_cb").value;
            var cvv_cb = document.getElementById("cvv_cb").value;

            if (!estEntier(num_cb) || !estEntier(cvv_cb) || !estMoisAnnee(exp_cb) || titulaire_cb === "") {
                alert("Veuillez remplir correctement tous les champs pour la Carte bancaire");
                return false;
            }
        } else if (methode === "visa") {
            var num_visa = document.getElementById("num_visa").value;
            var titulaire_visa = document.getElementById("titulaire_visa").value;
            var exp_visa = document.getElementById("exp_visa").value;
            var cvv_visa = document.getElementById("cvv_visa").value;

            if (!estEntier(num_visa) || !estEntier(cvv_visa) || !estMoisAnnee(exp_visa) || titulaire_visa === "") {
                alert("Veuillez remplir correctement tous les champs pour la Carte VISA");
                return false;
            }
        } else if (methode === "mc") {
            var num_mc = document.getElementById("num_mc").value;
            var exp_mc = document.getElementById("exp_mc").value;
            var cvv_mc = document.getElementById("cvv_mc").value;

            if (!estEntier(num_mc) || !estEntier(cvv_mc) || !estMoisAnnee(exp_mc)) {
                alert("Veuillez remplir correctement tous les champs pour la MasterCard");
                return false;
            }
        } else if (methode === "edinar") {
            var num_edinar = document.getElementById("num_edinar").value;
            var code_edinar = document.getElementById("code_edinar").value;

            if (!estEntier(num_edinar) || !estEntier(code_edinar)) {
                alert("Veuillez remplir correctement tous les champs pour l'e-DINAR");
                return false;
            }
        }

        // Vérification de l'ID et d'autres champs généraux
        var id = document.getElementById("username").value;
        var cour = document.getElementById("cour").value;
        var type_abonnement = document.getElementById("type").value;

        if (id === "" || cour === "" || type_abonnement === "") {
            alert("Veuillez remplir tous les champs obligatoires");
            return false;
        }

        return true; // Envoi du formulaire si tout est correct
    }

    function estEntier(chaine) {
        return /^\d+$/.test(chaine);
    }

    function estMoisAnnee(chaine) {
        return /^(0[1-9]|1[0-2])\/\d{2}$/.test(chaine);
    }
</script>
</body>
</html>
