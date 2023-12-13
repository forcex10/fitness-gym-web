<?php
session_start();
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/AbonnementC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Controller/TypeAbonnementC.php";
include_once "C:/xampp/htdocs/fitness-gym-web/Model/Abonnement.php";
$id_type=$_GET['id_type_abo'];
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
            $abonnement=new Abonnement(NULL,$_SESSION['id'],$_POST['cour'],$_POST['type'],$_POST['methode'],$_POST['num_cb'],$_POST['titulaire_cb'],$_POST['exp_cb'],$_POST['cvv_cb'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

        }

        else if($methode==='visa')
        {
            $abonnement=new Abonnement(NULL,$_SESSION['id'],$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,$_POST['num_visa'],$_POST['titulaire_visa'],$_POST['exp_visa'],$_POST['cvv_visa'],NULL,NULL,NULL,NULL,NULL);

        }

        else if($methode==='mc')
        {
            $abonnement=new Abonnement(NULL,$_SESSION['id'],$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['num_mc'],$_POST['exp_mc'],$_POST['cvv_mc'],NULL,NULL);

        }
        else 
        {
            $abonnement=new Abonnement(NULL,$_SESSION['id'],$_POST['cour'],$_POST['type'],$_POST['methode'],NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$_POST['num_edinar'],$_POST['code_edinar']);

            
        }
        $abonnementC->addAbonnement($abonnement);
        header('Location:index.php');

    }
    

}


?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fitness-gym</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../fitness-gym-web/View/Backoffice/template/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../fitness-gym-web/View/Backoffice/template/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../fitness-gym-web/View/Backoffice/template/assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../../fitness-gym-web/View/Backoffice/template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../../fitness-gym-web/View/Backoffice/template/assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="../../fitness-gym-web/View/Backoffice/template/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="css/style1.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../fitness-gym-web/View/Backoffice/template/assets/images/favicon.png">
<style type="text/css" id="operaUserStyle"></style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style><style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style>
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
document.addEventListener('DOMContentLoaded', function() {
afficherChampsCarte();


});
</script>

</head>


<body>

            <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body"><center>
                        <h4 class="card-title">S'Abonner</h4></center>
                        <br/>
                        <form class="forms-sample" action="" method="POST" onsubmit="return validerFormulaire()">
                        <div class="form-group row">
                            <label for="cour" class="col-sm-3 col-form-label">Cour</label>
                            <div class="col-sm-9">
                            <select id="cour" name="cour" class="form-control form-control-sm text-light" >
                                <option value="boxe">boxe </option>
                                <option value="musculation">musculation</option>
                                <option value="natation">natation</option>
                                <option value="gymnastic">gymnastic </option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label">Type d'Abonnement :</label>
                            <div class="col-sm-9">
                            <select id="type" name="type" class="form-control form-control-sm text-light">
                            <?php
                                foreach($list as $l){
                                    if($l['id_type_abo']==$id_type) : 
                                       echo '<option value="'.$l['id_type_abo'].'" >'.$l['nom'].'('.$l['duree'] . ' mois ' . $l['prix'] .' DT )';
                                    endif;
                                    }
                            ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="methode" class="col-sm-3 col-form-label">Methode</label>
                            <div class="col-sm-9">
                            <select id="methode" name="methode" class="form-control form-control-sm text-light" onchange="afficherChampsCarte()" >
                                <option value="none">None</option>
                                <option value="cb" >Carte bancaire</option>
                                <option value="visa">Carte VISA</option>
                                <option value="mc">Master Card</option>
                                <option value="edinar">e-DINAR</option>
                            </select>
                            <label id="erreur_methode" class="text-danger" ></label>
                            </div>
                        </div>
                        <div class="form-group row champ_carte" id="champ_cb" >
                            <label for="num_cb" class="col-sm-3 col-form-label">Numéro de Carte :</label>
                            <div class="col-sm-9">
                            <input type="text" id="num_cb" name="num_cb"  class="form-control text-light">
                            <br/>
                            <label id="erreur_num_cb" class="text-danger" ></label></div>
                            <label for="titulaire_cb" class="col-sm-3 col-form-label" >Titulaire de la Carte:</label>
                            <div class="col-sm-9">
                            <input type="text" id="titulaire_cb" name="titulaire_cb"  class="form-control text-light">
                            <br/>
                            <label id="erreur_titulaire_cb" class="text-danger" ></label></div>
                            <label for="exp_cb" class="col-sm-3 col-form-label">Date d'expiration :</label>
                            <div class="col-sm-9">
                            <input type="text" id="exp_cb" name="exp_cb"  class="form-control text-light">
                            <br/>
                            <label id="erreur_exp_cb"  class="text-danger"></label></div>
                            <label for="cvv_cb" class="col-sm-3 col-form-label">Code CVV :</label>
                            <div class="col-sm-9">
                            <input type="text" id="cvv_cb" name="cvv_cb"  class="form-control text-light">
                            <br/>
                            <label id="erreur_cvv_cb" class="text-danger"></label></div>
                        </div>
                        <div class="form-group row champ_carte" id="champ_visa">
                                <label for="num_visa" class="col-sm-3 col-form-label">Numéro de Carte VISA :</label>
                                <div class="col-sm-9">
                                <input type="text" id="num_visa" name="num_visa"  class="form-control text-light">
                                <br/>
                                <label id="erreur_num_visa" class="text-danger" ></label></div>
                                <label for="titulaire_visa" class="col-sm-3 col-form-label" >Titulaire de la Carte  VISA:</label>
                                <div class="col-sm-9">
                                <input type="text" id="titulaire_visa" name="titulaire_visa"  class="form-control text-light">
                                <br/>
                                <label id="erreur_titulaire_visa" class="text-danger" ></label></div>
                                <label for="exp_visa" class="col-sm-3 col-form-label">Date d'expiration  VISA:</label>
                                <div class="col-sm-9">
                                <input type="text" id="exp_visa" name="exp_visa"  class="form-control text-light">
                                <br/>
                                <label id="erreur_exp_visa"  class="text-danger"></label></div>
                                <label for="cvv_visa" class="col-sm-3 col-form-label">Code CVV  VISA :</label>
                                <div class="col-sm-9">
                                <input type="text" id="cvv_visa" name="cvv_visa"  class="form-control text-light">
                                <br/>
                                <label id="erreur_cvv_visa" class="text-danger"></label></div>
                        </div>

                        <div class="form-group row champ_carte" id="champ_mc">
                                <label for="num_mc" class="col-sm-3 col-form-label">Numéro de la master Card  :</label>
                                <div class="col-sm-9">
                                <input type="text" id="num_mc" name="num_mc"  class="form-control text-light">
                                <br/>
                                <label id="erreur_num_mc" class="text-danger" ></label></div>
                                <label for="exp_mc" class="col-sm-3 col-form-label">Date d'expiration de la master Card :</label>
                                <div class="col-sm-9">
                                <input type="text" id="exp_mc" name="exp_mc"  class="form-control text-light">
                                <br/>
                                <label id="erreur_exp_mc"  class="text-danger"></label></div>
                                <label for="cvv_mc" class="col-sm-3 col-form-label">Code CVV de la master Card :</label>
                                <div class="col-sm-9">
                                <input type="text" id="cvv_mc" name="cvv_mc"  class="form-control text-light">
                                <br/>
                                <label id="erreur_cvv_mc" class="text-danger"></label></div>
                        </div>
                        <div class="form-group row champ_carte" id="champ_edinar">
                                <label for="num_edinar" class="col-sm-3 col-form-label">Numéro de la carte edinar  :</label>
                                <div class="col-sm-9">
                                <input type="text" id="num_edinar" name="num_edinar"  class="form-control text-light">
                                <br/>
                                <label id="erreur_num_edinar" class="text-danger" ></label></div>
                                <label for="code_edinar" class="col-sm-3 col-form-label">Code Secret :</label>
                                <div class="col-sm-9">
                                <input type="text" id="code_edinar" name="code_edinar"  class="form-control text-light">
                                <br/>
                                <label id="erreur_code_edinar" class="text-danger"></label></div>
                        </div><center>
                        <button type="submit" class="btn btn-primary btn-rounded btn-fw" > S'abonner </button>
                        <a href="index.php" class="btn btn-danger btn-rounded btn-fw">Annuler </a><center>
                        </form>
                    </div>
                    </div>
                </div>




    <script src="../../fitness-gym-web/View/Backoffice/template/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/js/off-canvas.js"></script>
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/js/hoverable-collapse.js"></script>
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/js/misc.js"></script>
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/js/settings.js"></script>
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../../fitness-gym-web/View/Backoffice/template/assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->


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
        if(!estEntier(num_cb) || num_cb<1000000000000000 || num_cb>9999999999999999){
            erreur_num_cb.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_cb.length + " chiffres"; return false;}
        else 
            erreur_num_cb.innerHTML="";

        if(!estEntier(cvv_cb) || cvv_cb<1000 || cvv_cb>9999 ){
            erreur_cvv_cb.innerHTML="Veuillez saisir un code de carte bancaire correct (4 chiffre )";return false;}
        else 
            erreur_cvv_cb.innerHTML="";
        if(!estMoisAnnee(exp_cb)){
            erreur_exp_cb.innerHTML="Veuillez saisir une date d'expiration correct de la carte bancaire (mm/aa) ";return false;}
        else 
            erreur_exp_cb.innerHTML="";
        if(titulaire_cb === ""){
            erreur_titulaire_cb.innerHTML="Veuillez saisir un titulaire de la carte bancaire ";return false;}
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
        if(!estEntier(num_visa) || num_visa<1000000000000000  || num_visa>9999999999999999){
            erreur_num_visa.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_visa.length + " chiffres";return false;}
        else 
            erreur_num_visa.innerHTML="";
        if(!estEntier(cvv_visa) || cvv_visa<1000 || cvv_visa>9999 ){
            erreur_cvv_visa.innerHTML="Veuillez saisir un code de carte VISA correct (4 chiffres )";return false;}
        else 
            erreur_cvv_visa.innerHTML="";
        if(!estMoisAnnee(exp_visa)){
            erreur_exp_visa.innerHTML="Veuillez saisir une date d'expiration correct de la carte VISA (mm/aa)";return false;}
        else 
            erreur_exp_visa.innerHTML="";
        if(titulaire_visa === ""){
            erreur_titulaire_visa.innerHTML="Veuillez saisir un titulaire de la carte VISA ";return false;}
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
        if(!estEntier(num_mc) || num_mc<1000000000000000 || num_mc>9999999999999999){
            erreur_num_mc.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_mc.length + " chiffres";return false;}
        else 
            erreur_num_mc.innerHTML="";
        if(!estEntier(cvv_mc) || cvv_mc<1000 || cvv_mc>9999 ){
            erreur_cvv_mc.innerHTML="Veuillez saisir un code de carte VISA correct (4 chiffres )";return false;}
        else 
            erreur_cvv_mc.innerHTML="";
        if(!estMoisAnnee(exp_mc)){
            erreur_exp_mc.innerHTML="Veuillez saisir une date d'expiration correct de la master carte (mm/aa)";return false;}
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
        if(!estEntier(num_edinar) || num_edinar<1000000000000000 || num_edinar>9999999999999999){
            erreur_num_edinar.innerHTML="Veuillez saisir un numero de carte bancaire correct (16 chiffres) Actuellement: " + num_edinar.length + " chiffres";return false;}
        else 
            erreur_num_edinar.innerHTML="";
        if(!estEntier(code_edinar) || code_edinar<1000 || code_edinar>9999 ){
            erreur_code_edinar.innerHTML="Veuillez saisir un code de carte edinar correct (4 chiffres )";return false;}
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