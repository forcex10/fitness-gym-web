<?php
require "C:/xampp/htdocs/fitness-gym-web/model/user.php";
require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";

$clientC = new UserC();

if (
    isset($_POST['lastName']) &&
    isset($_POST['firstName']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['password']) &&
    isset($_POST['userType'])
) {
    if ($_POST['userType'] == "employe") {
        if (isset($_POST["diplome"])) {
            $client = new User(
                $_POST['lastName'],
                $_POST['firstName'],
                $_POST['email'],
                $_POST['phone'],
                NULL,
                $_POST['password'],
                $_POST['userType'],
                $_POST["diplome"],
                NULL
            );
            $newc = $clientC->addClient($client);
            echo '<div style="color: green; font-weight: bold;">compte ajoute avec succes.</div>';
        } else {
            echo '<div style="color: red; font-weight: bold;">compte ajoute avec echec.</div>';
        }
    } else if ($_POST['userType'] == "directeur") {
        if (isset($_POST['projetRc'])) {
            $client1 = new User(
                $_POST['firstName'],
                $_POST['lastName'],
                $_POST['email'],
                $_POST['phone'],
                NULL,
                $_POST['password'],
                $_POST['userType'],
                NULL,
                $_POST['projetRc']
            );
            $newc = $clientC->addClient($client1);
            echo '<div style="color: green; font-weight: bold;">compte ajoute avec succes.</div>';
        } else {
            echo '<div style="color: red; font-weight: bold;">compte ajoute avec echec.</div>';
        }
    }
    else if($_POST['userType'] == "client"){
        $client1 = new User(
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['email'],
            $_POST['phone'],
            NULL,
            $_POST['password'],
            $_POST['userType'],
            NULL,
            NULL);
            $newc = $clientC->addClient($client1);
            echo '<div style="color: green; font-weight: bold;">compte ajoute avec succes.</div>';
    }
}
else
    echo '<div style="color: red; font-weight: bold;">variable non definie.</div>';
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <style>
        /* Votre style CSS ici */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #formContainer {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        #logo {
            text-align: center;
            margin-bottom: 20px;
        }

        #logo img {
            width: 150px;
            height: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form id="registrationForm" method="post" action="">
    <label for="firstName">Prénom:</label>
    <input type="text" id="firstName" name="firstName" >
    <span id="firstNameError" class="error-message"></span>

    <label for="lastName">Nom:</label>
    <input type="text" id="lastName" name="lastName" >
    <span id="lastNameError" class="error-message"></span>

    <label for="email">Adresse e-mail:</label>
    <input type="text" id="email" name="email" >
    <span id="emailError" class="error-message"></span>

    <label for="phone">Numéro de téléphone:</label>
    <input type="text" id="phone" name="phone" >
    <span id="phoneError" class="error-message"></span>

    <label for="userType">Type d'utilisateur:</label>
    <select type="text" id="userType" name="userType" required onchange="showFields()">
        <option value="client">Client</option>
        <option value="employe">Employé</option>
        <option value="directeur">Directeur</option>
    </select>

    

    <!-- Champs spécifiques à l'employé -->
    <div id="employeeFields" style="display:none;">
        <label for="employeePosition">diplome : </label>
        <input type="text" id="employeePosition" name="diplome">
    </div>

    <!-- Champs spécifiques au directeur -->
    <div id="directorFields" style="display:none;">
        <label for="directorResponsibilities">projetRecents</label>
        <input type="text" id="directorResponsibilities" name="projetRc">
    </div>

    <!-- Ajoutez d'autres champs spécifiques aux types d'utilisateurs ici -->

    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" >
    <span id="passwordError" class="error-message"></span>

    <label for="confirmPassword">Confirmer le mot de passe:</label>
    <input type="password" id="confirmPassword" name="confirmPassword" >
    <span id="confirmPasswordError" class="error-message"></span>

    <button type="submit">S'inscrire</button>
</form>

<script>

function displayErrorMessage(elementId, message) {
    var errorElement = document.getElementById(elementId);
    errorElement.innerHTML = message;
    errorElement.style.color = 'red';
}

function clearErrorMessages() {
    var errorElements = document.querySelectorAll('.error-message');
    errorElements.forEach(function (element) {
        element.innerHTML = '';
    });
}

function validateForm() {
    var firstName = document.getElementById('firstName');
    var lastName = document.getElementById('lastName');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');
    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('confirmPassword');

    clearErrorMessages();

    if (firstName.value === "") {
        displayErrorMessage('firstNameError', 'Veuillez entrer votre prénom.');
        return;
    }

    if (lastName.value === "") {
        displayErrorMessage('lastNameError', 'Veuillez entrer votre nom.');
        return;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
        displayErrorMessage('emailError', 'Veuillez entrer une adresse e-mail valide.');
        return;
    }

    var phoneRegex = /^\d{10}$/;
    if (!phoneRegex.test(phone.value)) {
        displayErrorMessage('phoneError', 'Veuillez entrer un numéro de téléphone valide.');
        return;
    }

    if (password.value.length < 6) {
        displayErrorMessage('passwordError', 'Le mot de passe doit contenir au moins 6 caractères.');
        return;
    }

    if (confirmPassword.value !== password.value) {
        displayErrorMessage('confirmPasswordError', 'Les mots de passe ne correspondent pas.');
        return;
    }

    document.getElementById('registrationForm').submit();
}







    
   function showFields() {
    var userType = document.getElementById('userType').value;

    var employeeFields = document.getElementById('employeeFields');
    var directorFields = document.getElementById('directorFields');


      if (userType === 'employe') {
       
        employeeFields.style.display = 'block';
        directorFields.style.display = 'none';
    } 
    else if (userType === 'directeur') {
        employeeFields.style.display = 'none';
        directorFields.style.display = 'block';
    } 
    else {
        // Masquer tous les champs si le type d'utilisateur est inconnu ou non spécifié
        employeeFields.style.display = 'none';
        directorFields.style.display = 'none';
    }

   }

    document.getElementById('registrationForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // Récupérer les valeurs du formulaire
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var userType = document.getElementById('userType').value;

        // Récupérer les valeurs spécifiques au type d'utilisateur
        var employeePosition = document.getElementById('employeePosition').value;
        var directorResponsibilities = document.getElementById('directorResponsibilities').value;


        validateForm();
    });

</script>

</body>
</html>
