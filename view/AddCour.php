<?php
require_once "../controller/type_courC.php";
include '../controller/coursC.php';
include '../model/cours.php';

$msg ="";


$error = "";


$coutypeC = new courTypeC();
// create client
$cour = null;

// create an instance of the controller
$courC = new courC();
if(isset($_POST["upload"])){
  $target = "images/".basename($_FILES['image']['name']);

  $image = $_FILES['image']['name'];
  
}



if (
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["niveau"])&&
    isset($_POST["nom_type"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["description"]) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["niveau"])&&
        !empty($_POST["nom_type"])
    ) {
      $image = $_FILES['image']['name'];
        $cour = new cour(
            null,
            $_POST['nom'],
            $_POST['description'],
            $_POST['prix'],
            $_POST['niveau'],
            $_POST["nom_type"],
            $image
        );
        $courC->addcours($cour);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
          $msg = "image uploaded successfully";
        }else{
          $msg = "there was a problem uploading image";
        }
        header('Location:listCour.php');
    } else
        $error = "Missing information";
}

$types = $coutypeC->afficheType();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="formulaire.css">
    

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


    <form action="" method="POST" enctype="multipart/form-data" id="coursForm">

    <input type="hidden" name="size" value="1000000">
    <table>

    <!-- ID du cours retire -->
    <tr>
      <td><label for="nomCours">Nom du cours:</label></td>
    </tr>
    <tr>
      <td>
      <input type="text" id="nomCours" name="nom"  style="width: 80%">

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
      <td><label for="enseignant">prix:</label>
    <br><br>
      
        
        <input id="prix" name="prix" style="width: 30%"></input>
        <span id="erreurprice" style="color: red"></span>
      </td>
    </tr>

    
    <tr>
      <td><label for="niveau"  >Niveau:</label>
        <select type="text" name="niveau" id="niveau"  required>
        <option >beginner</option>
          <option >average</option>
          <option >expert</option>
        </select>
        <small id="erreurniveau" style="color: red; "></small>
      </td>
    </tr>

    <tr>

              
<input type="file" name="image" >

</tr>
          <tr>
          <label for="nom_type">Selectionnez un genre :</label>
          <select name="nom_type" id="genre">
          <?php
          foreach ($types as $genre) {
          echo '<option value="' . $genre['id'] . '">' . $genre['nom_type'] . '</option>';
          }
          ?>
          </select>
          </tr>

          <tr>
            <td>
                <input type="submit" value="Save" name="upload" id="but-ajt" >
                
            </td>
            <td><input type="reset" value="Reset"></td>
                
            </tr>
        </div>
        </div>
    </table>
</form>
<script src="formulairejs.js"></script>
</body>

</html>

