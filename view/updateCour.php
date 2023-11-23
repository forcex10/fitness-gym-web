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
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $cour = new cour(
            null,
            $_POST['nom'],
            $_POST['description'],
            $_POST['enseignant'],
            $_POST['horaire']
        );
        var_dump($cour);
        
        $courC->updateCour($cour, $_POST['idCour']);

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
    <link rel="stylesheet" type="text/css" href="update.css">
    <title>user display </title>
</head>

<body>
    <button> <a href="listCour.php">Back to list </a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>


    <?php
    if (isset($_POST['idCour'])) {
        $cour = $courC->showCours($_POST['idCour']);
        
    ?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="coursForm">
    <table>
    <!-- ID du cours retire -->
    <tr>
                    <td><label for="nom">Id Cour :</label></td>
                    </tr>
                    <tr>
                    <td>
                    <input type="text" id="id" name="idCour" value="<?php echo $_POST['idCour'] ?>" readonly />

                        <span id="erreurNom" style="color: red"></span>
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
      <td><label for="enseignant">Enseignant:</label>
    <br><br>
      
        <select id="enseignant" name="enseignant" value="<?php echo $cour['enseignant'] ?>">
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
        <input type="time" name="horaire" id="horaires" min="8:00" max="20:00"  required value="<?php echo $cour['horaire'] ?>"/>
        <small id="erreurHoraire" style="color: red; "></small>
      </td>
      
    </tr>
    
            <td>
                <input type="submit" value="Save">
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
</body>

</html>