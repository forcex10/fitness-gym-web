<?php

include '../controller/coursC.php';
include '../model/cours.php';

$error = "";

// create client
$cour = null;

// create an instance of the controller
$courC = new courC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["enseignant"]) &&
    isset($_POST["horaire"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["description"]) &&
        !empty($_POST["enseignant"]) &&
        !empty($_POST["horaire"])
    ) {
        $cour = new cour(
            null,
            $_POST['nom'],
            $_POST['description'],
            $_POST['enseignant'],
            $_POST['horaire']
        );
        $courC->addcours($cour);
        header('Location:listCour.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="formulaire.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-VKM+IvT5y4L4R5e4I5L0GtfVGr2EqTiU6ftqMnFAqE+6RbBu1fT0jEpdih8tu8H1bsOM/Fb8NQ2FqhNoMvPbCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Cour </title>
</head>

<body>
<div class="container">
  <h1>Cour</h1>
  
  <a href="listCour.php" class="go-back-link">
  <img src="goback.png" alt="Go Back" id="goback"> 
</a>

    <hr>
    

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" >
    <table>
    <form id="coursForm">
    <!-- ID du cours retire -->
    <tr>
      <td><label for="nomCours">Nom du cours:</label></td>
    </tr>
    <tr>
      <td>
      <input type="text" id="nomCours" name="nom" required style="width: 80%">

        <span id="erreurNom" style="color: red"></span>
      </td>
    </tr>

    <tr>
      <td><label for="descCours">Description du cours:</label></td>
    </tr>
    <tr>
      <td>
        <textarea id="descCours" name="description" rows="4" required class="aaa"></textarea>
        <span id="erreurDescours" style="color: red"></span>
      </td>
    </tr>
    
    <tr>
      <td><label for="enseignant">Enseignant:</label>
    <br><br>
      
        <select id="enseignant" name="enseignant">
          <option value="enseignant1">brus lee</option>
          <option value="enseignant2">amen lkatheb</option>
          <option value="enseignant3">jacki shan</option>
          <option value="enseignant4">salem</option>
          <option value="enseignant5">the rock</option>
          <option value="enseignant6">shvanchtaiger</option>
        </select>
      </td>
    </tr>

    
    <tr>
      <td><label for="horaire"  >Saisir l'horaire de l entrainement:</label>
        <input type="time" name="horaire" id="horaires" min="8:00" max="20:00"  required>
        <small id="erreurHoraire" style="color: red; "></small>
      </td>
      
    </tr>
          <tr>
            <td>
                <input type="submit" value="Save" id="but-ajt" >
                
            </td>
            <td><input type="reset" value="Reset"></td>
                
            </tr>
        </div>
        </div>
    </table>
</form>
<script src="formulaire.js"></script>
</body>

</html>

