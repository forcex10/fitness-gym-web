<?php

include '../controller/type_courC.php';
include '../model/type_cour.php';
$error = "";

// create client
$courType = null;
// create an instance of the controller
$courTypeC = new courTypeC();


if (
    isset($_POST["typenom"]) &&
    isset($_POST["typedescription"]) 
    
) {
    if (
        !empty($_POST['typenom']) &&
        !empty($_POST["typedescription"]) 
        
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $courType = new courType(
            null,
            $_POST['typenom'],
            $_POST['typedescription']
        );
        var_dump($courType);
        
        $courTypeC->updateTypeCour($courType, $_POST['id']);

        header('Location:listTypeCour.php');
    } else
        $error = "Missing information";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="updateType.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-VKM+IvT5y4L4R5e4I5L0GtfVGr2EqTiU6ftqMnFAqE+6RbBu1fT0jEpdih8tu8H1bsOM/Fb8NQ2FqhNoMvPbCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>user display </title>
</head>

<body>
    <div class="container">

    <a href="listTypeCour.php" class="go-back-link">
  <img src="goback.png" alt="Go Back" id="goback"> 
</a>
    
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>


    <?php
    if (isset($_POST['id'])) {
        $courType = $courTypeC->showTypeCours($_POST['id']);
        
    ?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="coursForm">
    <table>
    <!-- ID du cours retire -->
    <tr>
                    <td><label for="nom">Id type du Cour :</label></td>
                    </tr>
                    <tr>
                    <td>
                    <input type="text" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />

                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
    
      <td><label for="nomCours">Nom de type du  cours:</label></td>
    </tr>
    <tr>
      <td>
        <input type="text" id="nomCours" name="typenom" required value="<?php echo $courType['nom_type'] ?>"/>
        <span id="erreurNom" style="color: red"></span>
      </td>
    </tr>

    <tr>
      <td><label for="descCours">Description de type du cours:</label></td>
    </tr>
    <tr>
      <td>
      <textarea id="descCours" name="typedescription" rows="4" required class="aaa"><?php echo $courType['description_type']; ?></textarea>
        <span id="erreurDescours" style="color: red"></span>
      </td>
    </tr>
    
            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>  
        </div>
        </div>
    </table>
</form>
<?php
    }
    ?>
</body>

</html>