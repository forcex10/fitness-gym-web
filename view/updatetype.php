<?php

include '../controller/typeC.php';
include '../model/type.php';
include 'verif.php';
$error = "";

// create client
$type = null;
// create an instance of the controller
$typeC = new typeC();


if (
    isset($_POST["typename"]) &&
    isset($_POST["typedescription"]) 
) {
    if (
        !empty($_POST["typename"]) &&
        !empty($_POST["typedescription"]) &&
         validerNom($_POST["typename"]) && validerDescription($_POST["typedescription"])  
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $type = new type(
            null,
            $_POST["typename"],
            $_POST["typedescription"],
        );
        //var_dump($produit);
        
        $typeC->updatetype($type, $_POST['idtype']);

        header('Location:listetype.php');
    } else
        $error = "Missing information";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="type.css">
    
    <title>type</title>
</head>

<body>
   

   


    <?php
    if (isset($_POST['idtype'])) {
        $type = $typeC->showtype($_POST['idtype']);
        
    ?>

<form action="" method="POST" id="gymForm1" >
<center>
    <h1>type</h1>
    <h2>
    <a href="listetype.php">Back to list </a>
    </h2>
</center>

        <table>
        <tr>
                    <td><label for="nom">IdProduit :</label></td>
                    <td>
                        <input type="text" id="idtype" name="idtype" value="<?php echo $_POST['idtype'] ?>" readonly />
                        
                    </td>
                </tr>
       <tr>
                <td><label for="typename">Nom_type :</label></td>
                <td>
                <input type="text" id="typename" name="typename" value="<?php echo $type['nomtype'] ?>" />
                <span id="erreurnomtype"  class="erreurtype" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="typedescription">Description_type :</label></td>
                <td>
                <textarea  id="typedescription" name="typedescription" ><?php echo $type['descriptiontype'] ?> </textarea>
                <span id="erreurdescriptiontype"  class="erreurtype" style="color: red"></span>
                </td>
            </tr>
           


            <td>
                <input type="submit" value="Save" id="saveButton1" class="design11">
            </td>
            <td>
                <input type="reset" value="Reset"  id="resetButton1" class="design11" onclick="effacerMessagesErreurtype()" >
            </td>
            <td>
            <button type="button" id="bouton1"  >Verifier</button></td>
        </table>

    </form>
    <?php
    }
    ?>
    <script src="njareb.js"></script>
</body>

</html>