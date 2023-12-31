<?php
require_once "../controller/type_courC.php";
include '../controller/coursC.php';
include '../model/cours.php';
$error = "";


$coutypeC = new courTypeC();
if(isset($_POST["save"])){
    $target = "images/" . basename($_FILES['image']['name']);
    $image=$_FILES['image']['name'];

}
// create client
$cour = null;
// create an instance of the controller
$courC = new courC();
$msg="";

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
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $cour = new cour(
            null,
            $_POST['nom'],
            $_POST['description'],
            $_POST['prix'],
            $_POST['niveau'],
            $_POST['nom_type'],
            $image
        );
        var_dump($cour);
        
        $courC->updateCour($cour, $_POST['idCour']);
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            $msg="Image uploaded successfully";
                    }else{
                        $msg="the was a problem uploading image". $_FILES['image']['error'];
                    }

        header('Location:listCour.php');
    } else
        $error = "Missing information";
}

$type = $coutypeC->afficheType();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="updateCour.css">
   
    <title>user display </title>
</head>

<body>
<div class="container">

<a href="listCour.php" class="go-back-link">
<img src="goback.png" alt="Go Back" id="goback"> 
</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>


    <?php
    if (isset($_POST['idCour'])) {
        $cour = $courC->showCours($_POST['idCour']);
    ?>


<form action="" method="POST" id="coursForm"  enctype="multipart/form-data">
<input   type="hidden"   name="size"  value="1000000"    >
    <table>
    <!-- ID du cours retire -->
    <tr>
                    <td><label for="nom">Id Cour :</label></td>
                    </tr>
                    <tr>
                    <td>
                    <input type="text" id="id" name="idCour" value="<?php echo $_POST['idCour'] ?>" readonly />
                    </td>
                </tr>
    
      <td><label for="nomCours">Nom du cours:</label></td>
    </tr>
    <tr>
      <td>
        <input type="text" id="nomCours" name="nom" required value="<?php echo $cour['nom'] ?>"/>
        <span id="erreurNom" style="color: red"></span>
      </td>
    </tr>

    <tr>
      <td><label for="descCours">Description du cours:</label></td>
    </tr>
    <tr>
      <td>
      <textarea id="descCours" name="description" rows="4" required class="aaa"><?php echo $cour['description']; ?></textarea>
        <span id="erreurDescours" style="color: red"></span>
      </td>
    </tr>
    
    <tr>
      <td><label for="enseignant">prix:</label>
    <br><br>
      
    <input id="prix" name="prix" style="width: 30%" value="<?php echo $cour['prix'] ?>"></input>
    <span id="erreurprice" style="color: red"></span>
      </td>
    </tr>

    <tr>
               
               <td>
                  
               <input type="file" id="image" name="image" required>


               </td>
           </tr>

    <tr>
      <td><label for="horaire"  >Niveau:</label>
      <select type="text" name="niveau" id="horaires"  required value="<?php echo $cour['niveau'] ?>" >
        <option >beginner</option>
          <option >average</option>
          <option >expert</option>
        </select>
    
        <small id="erreurHoraire" style="color: red; "></small>
      </td>
      
    </tr>

   
    <td>
<label for="nom_type">choisir un type :</label>
          
    <select name="nom_type" id="nom_type">
        <?php foreach ($type as $types) { ?>
            <option value="<?= $types['id'] ?>">
                <div class="custom-option">
                    <span class="label">Nom : <?php echo $types['nom_type']  ?> </span>
                    <span class="value"><?= $types['nom_type'] ?></span>
                </div>
            </option>
        <?php } ?>
    </select>

        </td>
   
    
            <td>
                <input type="submit" value="Save"  name="save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>  
        
        </div>
    </table>
</form>
<?php
    }
    ?>
    <script src="updatecourjs.js"></script>
</body>

</html>