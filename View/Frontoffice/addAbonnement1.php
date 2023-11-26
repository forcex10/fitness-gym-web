<?php
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/AbonnementC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Model/Abonnement.php";
$TypeAbonnementC=new TypeAbonnementC();
$list = $TypeAbonnementC->listTypeAbonnement();
$abonnementC=new AbonnementC();
if (isset($_POST['cour']) && isset($_POST['type']) && isset($_POST['methode']))
{
    if(!empty($_POST['cour']) && !empty($_POST['type']) && !empty($_POST['methode']))
    {
        $methode=$_POST['methode'];
        var_dump($methode);
        if($methode==='cb')
        {
            $abonnement=new Abonnement(NULL,NULL,$_POST['cour'],$_POST['type'],$_POST['methode'],$_POST['num_cb'],$_POST['titulaire_cb'],$_POST['exp_cb'],$_POST['cvv_cb'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

        }

        else if($methode==='visa')
        {
            $abonnement=new Abonnement(NULL,NULL,$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,$_POST['num_visa'],$_POST['titulaire_visa'],$_POST['exp_visa'],$_POST['cvv_visa'],NULL,NULL,NULL,NULL,NULL);

        }

        else if($methode==='mc')
        {
            $abonnement=new Abonnement(NULL,NULL,$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['num_mc'],$_POST['exp_mc'],$_POST['cvv_mc'],NULL,NULL);

        }
        else 
        {
            $abonnement=new Abonnement(NULL,NULL,$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['num_edinar'],$_POST['code_edinar']);


        }
        
        $abonnementC->addAbonnement($abonnement);
        header('Location:Cours.html');

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
        .erreur {
        color: red; /* Couleur du texte en rouge */
        font-size: 14px; /* Taille de police */
        margin-top: 5px; /* Marge en haut pour l'écartement */
        display: block; /* Affichage en bloc pour que les messages d'erreur apparaissent sur une nouvelle ligne */
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


          <label for="cour">Cour :</label>
          <select id="cour" name="cour">
              <option value="boxe">boxe </option>
              <option value="musculation">musculation</option>
              <option value="natation">natation</option>
              <option value="gymnastic">gymnastic </option>
          </select>

          <label for="type">Type d'Abonnement :</label>
          <select id="type" name="type">
              <?php
                foreach($list as $l){
                    echo '<option value="'.$l['id_type_abo'].'">'.$l['nom'].'('.$l['duree'] . ' mois ' . $l['prix'] .' DT )' ;
                }
              ?>
          </select>


          <label for="methode">Méthode :</label>
          <select id="methode" name="methode" onchange="afficherChampsCarte()">
              <option value="none">None</option>
              <option value="cb">Carte bancaire</option>
              <option value="visa">Carte VISA</option>
              <option value="mc">Master Card</option>
              <option value="edinar">e-DINAR</option>
          </select>
          <label id="erreur_methode" class="erreur" ></label>

          <div id="champ_cb" class="champ_carte">
              <label for="num_cb">Numéro de Carte :</label>
              <input type="text" id="num_cb" name="num_cb">
              <label id="erreur_num_cb" class="erreur" ></label>
              <label for="titulaire_cb">Titulaire de la Carte:</label>
              <input type="text" id="titulaire_cb" name="titulaire_cb">
              <label id="erreur_titulaire_cb" class="erreur" ></label>
              <label for="exp_cb">Date d'expiration :</label>
              <input type="text" id="exp_cb" name="exp_cb">
              <label id="erreur_exp_cb"  class="erreur"></label>
              <label for="cvv_cb">Code CVV :</label>
              <input type="text" id="cvv_cb" name="cvv_cb">
              <label id="erreur_cvv_cb" class="erreur"></label>
          </div>

          <div id="champ_visa" class="champ_carte">
                <label for="num_visa">Numéro de Carte Visa :</label>
                <input type="text" id="num_visa" name="num_visa">
                <label id="erreur_num_visa" class="erreur" ></label>
                <label for="titulaire_visa">Titulaire de la Carte Visa :</label>
                <input type="text" id="titulaire_visa" name="titulaire_visa">
                <label id="erreur_titulaire_visa" class="erreur" ></label>
                <label for="exp_visa">Date d'expiration Visa (MM/AA) :</label>
                <input type="text" id="exp_visa" name="exp_visa">
                <label id="erreur_exp_visa" class="erreur" ></label>
                <label for="cvv_visa">Code de Sécurité (CVV) :</label>
                <input type="text" id="cvv_visa" name="cvv_visa">
                <label id="erreur_cvv_visa" class="erreur"></label>
          </div>

          <div id="champ_mc" class="champ_carte">
            <label for="num_mc">Numéro de la Master Carte:</label>
            <input type="text" id="num_mc" name="num_mc">
            <label id="erreur_num_mc" class="erreur"></label>
            <label for="exp_mc">Date d'expiration Master Carte(MM/AA) :</label>
            <input type="text" id="exp_mc" name="exp_mc">
            <label id="erreur_exp_mc" class="erreur" ></label>
            <label for="cvv_mc">Code de Sécurité (CVV) :</label>
            <input type="text" id="cvv_mc" name="cvv_mc">
            <label id="erreur_cvv_mc" class="erreur"></label>
          </div>

          <div id="champ_edinar" class="champ_carte">
            <label for="num_edinar">Numero de la carte e-dinar:</label>
            <input type="text" id="num_edinar" name="num_edinar">
            <label id="erreur_num_edinar" class="erreur"></label>
        
            <label for="code_edinar">Code secret :</label>
            <input type="text" id="code_edinar" name="code_edinar">
            <label id="erreur_code_edinar" class="erreur"></label>
        
         </div>

          <input type="submit" value="S'abonner">
      </form>
  </div>
  <script>
    function validerFormulaire() {
        var methode = document.getElementById("methode").value;
        var champsCarte = document.querySelectorAll(".champ_carte");
        var erreur_methode = document.getElementById("erreur_methode");

        // Vérification si la méthode de paiement est sélectionnée
        if (methode === "none") {
            erreur_methode.innerHTML="Veuillez sélectionner une méthode de paiement";
            return false; // Empêche l'envoi du formulaire si la méthode n'est pas choisie
        }
        else {
            erreur_methode.innerHTML="";
        }

        // Vérification des champs selon la méthode de paiement sélectionnée
        if (methode === "cb") {
            var num_cb = document.getElementById("num_cb").value;
            var titulaire_cb = document.getElementById("titulaire_cb").value;
            var exp_cb = document.getElementById("exp_cb").value;
            var cvv_cb = document.getElementById("cvv_cb").value;
            var erreur_num_cb = document.getElementById("erreur_num_cb");
            var erreur_titulaire_cb = document.getElementById("erreur_titulaire_cb");
            var erreur_exp_cb = document.getElementById("erreur_exp_cb");
            var erreur_cvv_cb = document.getElementById("erreur_cvv_cb");


            if (!estEntier(num_cb) || num_cb<1000000000000000 || num_cb>9999999999999999 || !estEntier(cvv_cb) || cvv_cb<1000 || cvv_cb>9999 || !estMoisAnnee(exp_cb) || titulaire_cb === "") {
                if(!estEntier(num_cb) || num_cb<1000000000000000 || num_cb>9999999999999999)
                    erreur_num_cb.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_cb.length + " chiffres";
                else 
                    erreur_num_cb.innerHTML="";

                if(!estEntier(cvv_cb) || cvv_cb<1000 || cvv_cb>9999 )
                    erreur_cvv_cb.innerHTML="Veuillez saisir un code de carte bancaire correct (4 chiffre )";
                else 
                    erreur_cvv_cb.innerHTML="";
                if(!estMoisAnnee(exp_cb))
                    erreur_exp_cb.innerHTML="Veuillez saisir une date d'expiration correct de la carte bancaire (mm/aa) ";
                else 
                    erreur_exp_cb.innerHTML="";
                if(titulaire_cb === "")
                    erreur_titulaire_cb.innerHTML="Veuillez saisir un titulaire de la carte bancaire ";
                else 
                    erreur_titulaire_cb.innerHTML="";

                return false;
            }
        } else if (methode === "visa") {
            var num_visa = document.getElementById("num_visa").value;
            var titulaire_visa = document.getElementById("titulaire_visa").value;
            var exp_visa = document.getElementById("exp_visa").value;
            var cvv_visa = document.getElementById("cvv_visa").value;
            var erreur_num_visa = document.getElementById("erreur_num_visa");
            var erreur_titulaire_visa = document.getElementById("erreur_titulaire_visa");
            var erreur_exp_visa = document.getElementById("erreur_exp_visa");
            var erreur_cvv_visa = document.getElementById("erreur_cvv_visa");

            if (!estEntier(num_visa) || num_visa<1000000000000000  || num_visa>9999999999999999 || !estEntier(cvv_visa) || cvv_visa<1000 || cvv_visa>9999 || !estMoisAnnee(exp_visa) || titulaire_visa === "") {
                if(!estEntier(num_visa) || num_visa<1000000000000000  || num_visa>9999999999999999)
                    erreur_num_visa.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_visa.length + " chiffres";
                else 
                    erreur_num_visa.innerHTML="";
                if(!estEntier(cvv_visa) || cvv_visa<1000 || cvv_visa>9999 )
                    erreur_cvv_visa.innerHTML="Veuillez saisir un code de carte VISA correct (4 chiffres )";
                else 
                    erreur_cvv_visa.innerHTML="";
                if(!estMoisAnnee(exp_visa))
                    erreur_exp_visa.innerHTML="Veuillez saisir une date d'expiration correct de la carte VISA (mm/aa)";
                else 
                    erreur_exp_visa.innerHTML="";
                if(titulaire_visa === "")
                    erreur_titulaire_visa.innerHTML="Veuillez saisir un titulaire de la carte VISA ";
                else 
                    erreur_titulaire_visa.innerHTML="";
                return false;
            }
        } else if (methode === "mc") {
            var num_mc = document.getElementById("num_mc").value;
            var exp_mc = document.getElementById("exp_mc").value;
            var cvv_mc = document.getElementById("cvv_mc").value;
            var erreur_num_mc = document.getElementById("erreur_num_mc");
            var erreur_exp_mc = document.getElementById("erreur_exp_mc");
            var erreur_cvv_mc = document.getElementById("erreur_cvv_mc");

            if (!estEntier(num_mc) || num_mc<1000000000000000 || num_mc>9999999999999999 || !estEntier(cvv_mc) || cvv_mc<1000 || cvv_mc>9999 || !estMoisAnnee(exp_mc)) {
                if(!estEntier(num_mc) || num_mc<1000000000000000 || num_mc>9999999999999999)
                    erreur_num_mc.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_mc.length + " chiffres";
                else 
                    erreur_num_mc.innerHTML="";
                if(!estEntier(cvv_mc) || cvv_mc<1000 || cvv_mc>9999 )
                    erreur_cvv_mc.innerHTML="Veuillez saisir un code de carte VISA correct (4 chiffres )";
                else 
                    erreur_cvv_mc.innerHTML="";
                if(!estMoisAnnee(exp_mc))
                    erreur_exp_mc.innerHTML="Veuillez saisir une date d'expiration correct de la master carte (mm/aa)";
                else 
                    erreur_exp_mc.innerHTML="";
                return false;
            }
        } else if (methode === "edinar") {
            var num_edinar = document.getElementById("num_edinar").value;
            var code_edinar = document.getElementById("code_edinar").value;
            var erreur_num_edinar = document.getElementById("erreur_num_edinar");
            var erreur_code_edinar = document.getElementById("erreur_code_edinar");

            if (!estEntier(num_edinar) || !estEntier(code_edinar) || num_edinar<1000000000000000 || num_edinar>9999999999999999 || code_edinar<1000 || code_edinar>9999 ) {
                if(!estEntier(num_edinar) || num_edinar<1000000000000000 || num_edinar>9999999999999999)
                    erreur_num_edinar.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_edinar.length + " chiffres";
                else 
                    erreur_num_edinar.innerHTML="";
                if(!estEntier(code_edinar) || code_edinar<1000 || code_edinar>9999 )
                    erreur_code_edinar.innerHTML="Veuillez saisir un code de carte edinar correct (4 chiffres )";
                else 
                    erreur_code_edinar.innerHTML="";
                return false;
            }
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
