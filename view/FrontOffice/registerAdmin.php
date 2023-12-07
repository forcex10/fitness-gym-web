<?php
require "C:/xampp/htdocs/fitness-gym-web/model/user.php";
require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";

$userC = new UserC();
$errors = array();


$recaptcha_secret = "6LfpYyMpAAAAAOhMukBZuZvUdxvVLrhC0LFSD5uP";
if(isset($_POST['g-recaptcha-response'])){
// Vérifier la réponse reCAPTCHA
$recaptcha_response = $_POST['g-recaptcha-response'];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = [
    'secret' => $recaptcha_secret,
    'response' => $recaptcha_response,
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded/r/n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$result_data = json_decode($result, true);
}
else{
  echo"";
}
if (
    isset($_POST['lastName']) &&
    isset($_POST['firstName']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['password']) 
   
) {
  if ($result_data['success']) {
    // La réponse reCAPTCHA est valide, traiter le formulaire normalement
    // ...
}
   if(isset($_FILES['pdp']) && $_FILES['pdp']['error'] == 0){
        if($userC->elementExists($_POST['email'])!=NULL){
            $errors['email'] = 'Email déjà existant.';
            
        }
        else{


    // Set the target directory for the uploaded file
    $targetDir = "upload/";

    // Generate a unique filename for the uploaded file
    $targetFile = $targetDir . uniqid() . '_' . basename($_FILES['pdp']['name']);

    // Move the uploaded file to the target directory
                    if (move_uploaded_file($_FILES['pdp']['tmp_name'], $targetFile)) {
                      if ($result_data['success']) {
                                                // La réponse reCAPTCHA est valide, traiter le formulaire normalement
                        // ...
                    
                                // File upload successful, store the filename in the database or use it as needed
                                $pdpFilename = $targetFile;

                                // Rest of your existing code...
                                $passwordH=password_hash($_POST['password'],PASSWORD_DEFAULT);
                                $client1 = new User(
                                    $_POST['firstName'],
                                    $_POST['lastName'],
                                    $_POST['email'],
                                    $_POST['phone'],
                                    NULL,
                                    $passwordH,
                                    "admin",
                                    $pdpFilename, // Use the filename in the User object
                                    NULL,
                                    NULL
                                );

                                $newc = $userC->addClient($client1);
                                $_SESSION['nom']=$_POST['lastName'];
                                $_SESSION['prenom']= $_POST['firstName'];
                                $_SESSION['password']=$_POST['password'];
                                $_SESSION['email']=$_POST['email'];
                                $_SESSION['tel']=$_POST['phone'];
                                $_SESSION['pdp']=$pdpFilename;
                                $_SESSION['type']="client";

                               // $id=$userC->elementExists($_POST['email']);
                            header("location: ../BackOffice/Backoffice/template/listAdmin.php");
                               // header('Location: site2/Compte.php?id_client='.$id);
                                
                      }
                      else{
                        $errors['captcha'] ="erreur captcha...";
                      }

                              
                    } 
                                                                                                                
                    else {
                        // File upload failed
                        $errors['pdp'] = 'Erreur de telechargement de photo.';
                    }
                    
            }
    }
   else{
    $errors['pdp'] = 'Image non sélectionnée.';
   } 
         
 } 
 else{
    echo '<div style="color: ; font-weight: bold;"></div>';
 }

?>



<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/css/styleL.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../BackOffice/Backoffice/template/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form id="registrationForm" method="post" action="" enctype="multipart/form-data">
                  
                  <div class="form-group">                  
                    <label for="firstName">Prénom:</label>
                    <input type="text" id="firstName" class="form-control p_input" name="firstName">
                    <span class="error-message" id="firstNameError"></span>
                  </div>

                  <div class="form-group">
                  
                    <label for="lastName">Nom:</label>
                    <input type="text" id="lastName" class="form-control p_input" name="lastName">
                     <span class="error-message" id="lastNameError"></span>
                  </div>

                  <div class="form-group"> 
                    <label for="email">Adresse e-mail:</label>
                    <input type="text" id="email" class="form-control p_input" name="email">
                    <span class="error-message" id="emailError" ><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
                  </div>
                  <div class="form-group"> 
                  <label for="phone">Numéro de téléphone:</label>
                  <input type="text" id="phone" class="form-control p_input" name="phone">
                  <span class="error-message" id="phoneError"></span>
                  </div>
                  <div class="form-group"> 
                  <label for="pdp">Photo de profil:</label>
                  <input type="file" id="pdp" class="form-control p_input" name="pdp" accept="image/*">
                  <span class="error-message" id="pdpError" ><?php echo isset($errors['pdp']) ? $errors['pdp'] : ''; ?></span>
                  </div>
                  
                  <div class="form-group"> 
                  <label for="password">Mot de passe:</label>
                  <input type="password" id="password" class="form-control p_input" name="password">
                   <span class="error-message" id="passwordError"></span>
                  </div>
                 
                  
                  <div class="form-group">                    
                <label for="confirmPassword">Confirmer le mot de passe:</label>
                <input type="password" id="confirmPassword" class="form-control p_input" name="confirmPassword">
                <span class="error-message" id="confirmPasswordError"> </span>
                  </div>

                  <div class="form-group"> 
                  <div class=" g-recaptcha" data-sitekey="6LfpYyMpAAAAAGwpCXHC5aE21i7w1B2-3KJFMuqC"></div>
                  <span class="error-message" id="captchaError" ><?php echo isset($errors['captcha']) ? $errors['captcha'] : ''; ?></span>
                  </div>
                
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Submit</button>
                  </div>
                 
                 
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../BackOffice/Backoffice/template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../BackOffice/Backoffice/template/assets/js/off-canvas.js"></script>
    <script src="../BackOffice/Backoffice/template/assets/js/hoverable-collapse.js"></script>
    <script src="../BackOffice/Backoffice/template/assets/js/misc.js"></script>
    <script src="../BackOffice/Backoffice/template/assets/js/settings.js"></script>
    <script src="../BackOffice/Backoffice/template/assets/js/todolist.js"></script>
    <!-- endinject -->

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

    var emailRegex = /^[^/s@]+@[^/s@]+/.[^/s@]+$/;
    if (!emailRegex.test(email.value)) {
        displayErrorMessage('emailError', 'Veuillez entrer une adresse e-mail valide.');
        return;
    }

    var phoneRegex = /^/d{10}$/;
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