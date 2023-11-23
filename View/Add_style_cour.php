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
        $courType = new courType(
            null,
            $_POST['typenom'],
            $_POST['typedescription']
            
        );
        $courTypeC->addTypecours($courType);
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
    <link rel="stylesheet" type="text/css" href="formulaire.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-VKM+IvT5y4L4R5e4I5L0GtfVGr2EqTiU6ftqMnFAqE+6RbBu1fT0jEpdih8tu8H1bsOM/Fb8NQ2FqhNoMvPbCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>type Cour </title>
</head>

<body>
<div class="container">
  <h1>type Cour</h1>
  
  <a href="listTypeCour.php" class="go-back-link">
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
      <td><label for="nomCours">Nom du type cours:</label></td>
    </tr>
    <tr>
      <td>
      <input type="text" id="nomCours" name="typenom"  style="width: 80%">

        <span id="erreurNom" style="color: red"></span>
      </td>
    </tr>

    <tr>
      <td><label for="descCours">Description du cours:</label></td>
    </tr>
    <tr>
      <td>
        <textarea id="descCours" name="typedescription" rows="4"  class="aaa"></textarea>
        <span id="erreurDescours" style="color: red"></span>
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
<script src=""></script>
</body>

</html>

