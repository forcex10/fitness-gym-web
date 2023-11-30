<?php
require "C:/xampp/htdocs/fitness-gym-web/model/user.php";
require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";

$userC = new UserC();
$errors = array();
if(isset($_POST['Submit'])){
    // Set the target directory for the uploaded file
    

    // Generate a unique filename for the uploaded file
    
}
else 
    echo'submit non défini';
if (
    isset($_POST['lastName']) &&
    isset($_POST['firstName']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['password']) 
   
) {
    $targetFile = "upload/" . basename($_FILES['pdp']['name']);
    $image=$targetFile;
    $client1 = new User(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['email'],
        $_POST['phone'],
        NULL,
        $_POST['password'],
        $_POST['userType'],
        $image, // Use the filename in the User object
        NULL,
        NULL
    );

    $newc = $userC->addClient($client1);
    echo"ajoout avec succes";
    
    

    if (move_uploaded_file($_FILES['pdp']['tmp_name'], $targetFile)) {
    $msg="uploaded successfully";        
      
} 
                                                                                        
else {

$msg=" non uploaded";
}

//    if(isset($_FILES['pdp']) && $_FILES['pdp']['error'] == 0)
//         if($userC->elementExists($_POST['email'])!=NULL){
//             $errors['email'] = 'Email déjà existant.';
            
//         }
        


    

    // Move the uploaded file to the target directory
                    
    
 
         
}
 else{
    echo '<div style="color: ; font-weight: bold;">Champ non défini.</div>';
 }

?>
<!-- Le reste de votre code HTML ici -->











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0; /* Light gray background */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        #formContainer {
            background-color: #000000; /* Black background */
            color: #ffffff; /* White text color */
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
            color: #ffffff; /* White text color */
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #ff0000; /* Red background */
            color: #ffffff; /* White text color */
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff3333; /* Lighter red on hover */
        }

        /* Positioning adjustments */
        #formContainer {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            width: 100%;
        }

        button {
            width: auto;
            margin-top: 15px;
        }
        .error-message {
        color: red;
    }
    </style>
</head>
<body>


<form id="registrationForm" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div id="formContainer">
        <label for="firstName">Prénom:</label>
        <input type="text" id="firstName" name="firstName">
        <span class="error-message" id="firstNameError"></span>

        <label for="lastName">Nom:</label>
        <input type="text" id="lastName" name="lastName">
        <span class="error-message" id="lastNameError"></span>

        <label for="email">Adresse e-mail:</label>
        <input type="text" id="email" name="email">
       

        <label for="phone">Numéro de téléphone:</label>
        <input type="text" id="phone" name="phone">
        <span class="error-message" id="phoneError"></span>

        <label for="userType">Type d'utilisateur:</label>
        <select type="text" id="userType" name="userType">
            <option value="client">Client</option>
        </select>

        <label for="pdp">Photo de profil:</label>
        <input type="file" id="pdp" name="pdp" >
       

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password">
        <span class="error-message" id="passwordError"></span>

        <label for="confirmPassword">Confirmer le mot de passe:</label>
        <input type="password" id="confirmPassword" name="confirmPassword">
        <span class="error-message" id="confirmPasswordError"> </span>

        <input type="submit" name="Submit" value="save">
    </div>
</form>
</body>
</html>





    

<!--    
     <div id="employeeFields" style="display:none;">
        <label for="employeePosition">diplome : </label>
        <input type="text" id="employeePosition" name="diplome">
    </div>

   
    <div id="directorFields" style="display:none;">
        <label for="directorResponsibilities">projetRecents</label>
        <input type="text" id="directorResponsibilities" name="projetRc">
    </div>   -->



 

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







    
   /*function showFields() {
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

   }*/

    document.getElementById('registrationForm').addEventListener('submit', function (event) {
        event.preventDefault();

        // Récupérer les valeurs du formulaire
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        


        validateForm();
    });

</script>

</body>
</html>
