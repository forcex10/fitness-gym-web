<?php
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/AbonnementC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Model/Abonnement.php";
$error = "";
$abonnementC = new AbonnementC();
$TypeAbonnementC=new TypeAbonnementC();
$list = $TypeAbonnementC->listTypeAbonnement();

$abonnement = null;

if (
    isset($_POST["username"]) &&
    isset($_POST["cour"]) &&
    isset($_POST["type"]) &&
    isset($_POST["methode"]) 
) {
    if (
        !empty($_POST["cour"]) &&
        !empty($_POST["type"]) &&
        !empty($_POST["methode"]) &&
        !empty($_POST["username"])
    ) {
        $abonnement = new Abonnement(
            null,
            $_POST['username'],
            $_POST['cour'],
            $_POST['type'],
            $_POST['methode'],
            $_POST['num_cb'],
            $_POST['titulaire_cb'],
            $_POST['exp_cb'],
            $_POST['cvv_cb'],
            $_POST['num_visa'],
            $_POST['titulaire_visa'],
            $_POST['exp_visa'],
            $_POST['cvv_visa'],
            $_POST['num_mc'],
            $_POST['exp_mc'],
            $_POST['cvv_mc'],
            $_POST['num_edinar'],
            $_POST['code_edinar']
        );

        $abonnementC->updateAbonnement($abonnement,$_POST['id_abonnement']);

        header('Location:listeAbonnement.php');
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
    <title>Mise à jour d'Abonnement</title>
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
    <a href="listeAbonnement.php" class="back-button">Retour</a>
    <?php
    $abonnement= $abonnementC->showAbonnement($_POST['id_abonnement']);
    ?>
    <div class="container">
        <h2>Formulaire de Mise à Jour d'Abonnement</h2>
        <form action="" method="POST" onsubmit="return validerFormulaire()">
        <label for="id_abonnement"> Id_abonnement : </label>
        <input type="text" id="id_abonnement" name="id_abonnement" value="<?php echo $_POST['id_abonnement'] ?>" readonly />
        <label for="username"> Username : </label>
        <input type="text" id="username" name="username" value="<?php echo $abonnement['username'] ;?>" />
        <label for="cour">Cour :</label>
          <select id="cour" name="cour" >
              <option value="boxe" <?php if( $abonnement['cour']==='boxe'){echo "selected";}?>>boxe </option>
              <option value="musculation" <?php if( $abonnement['cour']==='musculation'){echo "selected";}?>>musculation </option>
              <option value="natation"  <?php if( $abonnement['cour']==='natation'){echo "selected";}?>>natation </option>
              <option value="gymnastic" <?php if( $abonnement['cour']==='gymnastic'){echo "selected";}?>>gymnastic </option>
          </select>

          <label for="type">Type d'Abonnement :</label>
          <select id="type" name="type" >
          <?php
                foreach($list as $l){
                    echo '<option value="' . $l['id_type_abo'] . '"';
                    echo ($abonnement['id_type_abo'] === $l['id_type_abo']) ? ' selected' : '';
                    echo '>' . $l['nom'] . ' ( ' . $l['duree'] . ' mois ' . $l['prix'] . ' DT )';
                }
              ?>
          </select>


          <label for="methode">Méthode :</label>
          <select id="methode" name="methode"  onchange="afficherChampsCarte()" >
              <option value="none" <?php if( $abonnement['methode']==='None'){echo "selected";}?>>None </option>
              <option value="cb" <?php if( $abonnement['methode']==='cb'){echo "selected";}?>>Carte bancaire </option>
              <option value="visa" <?php if( $abonnement['methode']==='visa'){echo "selected";}?>>Carte VISA </option>
              <option value="mc" <?php if( $abonnement['methode']==='mc'){echo "selected";}?>>Master Card </option>
              <option value="edinar" <?php if( $abonnement['methode']==='edinar'){echo "selected";}?>>e-DINAR </option>
          </select>

          <div id="champ_cb" class="champ_carte">
              <label for="num_cb">Numéro de Carte :</label>
              <input type="text" id="num_cb" name="num_cb" value="<?php echo  $abonnement['num_cb'] ?>">
              <label for="titulaire_cb">Titulaire de la Carte:</label>
              <input type="text" id="titulaire_cb" name="titulaire_cb" value="<?php echo  $abonnement['titulaire_cb'] ?>">
              <label for="exp_cb">Date d'expiration :</label>
              <input type="text" id="exp_cb" name="exp_cb" value="<?php echo  $abonnement['exp_cb'] ?>">
              <label for="cvv_cb">Code CVV :</label>
              <input type="text" id="cvv_cb" name="cvv_cb" value="<?php echo  $abonnement['cvv_cb'] ?>">
          </div>

          <div id="champ_visa" class="champ_carte">
                <label for="num_visa">Numéro de Carte Visa :</label>
                <input type="text" id="num_visa" name="num_visa" value="<?php echo  $abonnement['num_visa'] ?>">
            
                <label for="titulaire_visa">Titulaire de la Carte Visa :</label>
                <input type="text" id="titulaire_visa" name="titulaire_visa" value="<?php echo  $abonnement['titulaire_visa'] ?>">
            
                <label for="exp_visa">Date d'expiration Visa (MM/AA) :</label>
                <input type="text" id="exp_visa" name="exp_visa" value="<?php echo  $abonnement['exp_visa'] ?>">
            
                <label for="cvv_visa">Code de Sécurité (CVV) :</label>
                <input type="text" id="cvv_visa" name="cvv_visa" value="<?php echo  $abonnement['cvv_visa'] ?>">
          </div>

          <div id="champ_mc" class="champ_carte">
            <label for="num_mc">Numéro de la Master Carte:</label>
            <input type="text" id="num_mc" name="num_mc" value="<?php echo  $abonnement['num_mc'] ?>">
        
            <label for="exp_mc">Date d'expiration Master Carte(MM/AA) :</label>
            <input type="text" id="exp_mc" name="exp_mc" value="<?php echo  $abonnement['exp_mc'] ?>">
        
            <label for="cvv_mc">Code de Sécurité (CVV) :</label>
            <input type="text" id="cvv_mc" name="cvv_mc" value="<?php echo  $abonnement['cvv_mc'] ?>">
          </div>

          <div id="champ_edinar" class="champ_carte">
            <label for="num_edinar">Numero de la carte e-dinar:</label>
            <input type="text" id="num_edinar" name="num_edinar" value="<?php echo  $abonnement['num_edinar'] ?>">
        
            <label for="code_edinar">Code secret :</label>
            <input type="text" id="code_edinar" name="code_edinar" value="<?php echo  $abonnement['code_edinar'] ?>">
        
         </div>

          <input type="submit" value="SAVE">
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

            if (!estEntier(num_cb) || num_cb<1000000000000000 || num_cb>9999999999999999 || !estEntier(cvv_cb) || cvv_cb<1000 || cvv_cb>9999 || !estMoisAnnee(exp_cb) || titulaire_cb === "") {
                if(!estEntier(num_cb) || num_cb<1000000000000000 || num_cb>9999999999999999)
                    alert("Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_cb.length + " chiffres");
                else if(!estEntier(cvv_cb) || cvv_cb<1000 || cvv_cb>9999 )
                    alert("Veuillez saisir un code de carte bancaire correct (4 chiffre )");
                else if(!estMoisAnnee(exp_cb))
                    alert("Veuillez saisir une date d'expiration correct de la carte bancaire (mm/aa) ");
                else if(titulaire_cb === "")
                    alert("Veuillez saisir un titulaire de la carte bancaire ");

                return false;
            }
        } else if (methode === "visa") {
            var num_visa = document.getElementById("num_visa").value;
            var titulaire_visa = document.getElementById("titulaire_visa").value;
            var exp_visa = document.getElementById("exp_visa").value;
            var cvv_visa = document.getElementById("cvv_visa").value;

            if (!estEntier(num_visa) || num_visa<1000000000000000  || num_visa>9999999999999999 || !estEntier(cvv_visa) || cvv_visa<1000 || cvv_visa>9999 || !estMoisAnnee(exp_visa) || titulaire_visa === "") {
                if(!estEntier(num_visa) || num_visa<1000000000000000  || num_visa>9999999999999999)
                alert("Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_visa.length + " chiffres");
                else if(!estEntier(cvv_visa) || cvv_visa<1000 || cvv_visa>9999 )
                    alert("Veuillez saisir un code de carte VISA correct (4 chiffres )");
                else if(!estMoisAnnee(exp_visa))
                    alert("Veuillez saisir une date d'expiration correct de la carte VISA (mm/aa)");
                else if(titulaire_visa === "")
                    alert("Veuillez saisir un titulaire de la carte VISA ");
                return false;
            }
        } else if (methode === "mc") {
            var num_mc = document.getElementById("num_mc").value;
            var exp_mc = document.getElementById("exp_mc").value;
            var cvv_mc = document.getElementById("cvv_mc").value;

            if (!estEntier(num_mc) || num_mc<1000000000000000 || num_mc>9999999999999999 || !estEntier(cvv_mc) || cvv_mc<1000 || cvv_mc>9999 || !estMoisAnnee(exp_mc)) {
                if(!estEntier(num_mc) || num_mc<1000000000000000 || num_mc>9999999999999999)
                alert("Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_mc.length + " chiffres");
                else if(!estEntier(cvv_mc) || cvv_mc<1000 || cvv_mc>9999 )
                    alert("Veuillez saisir un code de carte VISA correct (4 chiffres )");
                else if(!estMoisAnnee(exp_mc))
                    alert("Veuillez saisir une date d'expiration correct de la master carte (mm/aa)");
                return false;
            }
        } else if (methode === "edinar") {
            var num_edinar = document.getElementById("num_edinar").value;
            var code_edinar = document.getElementById("code_edinar").value;

            if (!estEntier(num_edinar) || !estEntier(code_edinar) || num_edinar<1000000000000000 || num_edinar>9999999999999999 || code_edinar<1000 || code_edinar>9999 ) {
                if(!estEntier(num_edinar) || num_edinar<1000000000000000 || num_edinar>9999999999999999)
                alert("Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_edinar.length + " chiffres");
                else if(!estEntier(code_edinar) || code_edinar<1000 || code_edinar>9999 )
                    alert("Veuillez saisir un code de carte edinar correct (4 chiffres )");
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
