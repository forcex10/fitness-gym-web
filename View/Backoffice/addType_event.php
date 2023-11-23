<?php
include('../../Controller/Type_eventC.php');
include '../../Model/Type_event.php';


    $type_eventController = new Type_eventC();
    if (isset($_POST['nom']) ) {
        if(!empty($_POST['nom'])){
            $type_event= new type_event(null,$_POST['nom']);
            $type_eventC =$type_eventController->addType_event($type_event);
            header("location:listeType_event.php");
        }
        else{
            $erreur="missing information";

        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un type d'evennement</title>

    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        a {
            display: block;
            margin: 20px 0;
            text-decoration: none;
            color: #007BFF;
            font-size: 16px;
        }

        hr {
            border: 1px solid #ddd;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        span {
            margin-left: 5px;
        }
    </style>
</head>
<body>

    <a  href="listeType_event.php"> Back to list </a>
    <hr>
    


<form action="" method="POST">
        <table>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" required />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>


            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>
</form>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.querySelector('form');
            var nomInput = document.getElementById('nom');
            var erreurNom = document.getElementById('erreurNom');

            form.addEventListener('submit', function (event) {
                // Vérifier si le champ "nom" contient des chiffres
                if (!/^[a-zA-Z]+$/.test(nomInput.value)) {
                    erreurNom.textContent = 'Le nom ne peut pas contenir de chiffres.';
                    event.preventDefault(); // Empêcher l'envoi du formulaire
                } else {
                    erreurNom.textContent = ''; // Effacer le message d'erreur s'il y en a un
                }
            });
        });
    </script>
</body>
</html>
