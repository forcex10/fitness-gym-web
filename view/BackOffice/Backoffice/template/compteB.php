
<?php

require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";
require "C:/xampp/htdocs/fitness-gym-web/model/user.php";
$error = "";

// create client
$user = null;
// create an instance of the controller
$userC = new UserC();
//id 
$id = $_GET['id_client'];

if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"])
    ) {
        $user = new User(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['tel'],
            null,
            $_POST['password'],
            null,
            null,
            null,
            null
        );

        $userC->updateUser($user, $id);
    } else
        $error = "Missing information";
}

if (isset($id)) {
    $user = $userC->showClient($id);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
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
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/css/style.css">
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
                    <label for="id_client">ID :</label>
                    <input type="text" class="form-control p_input" id="id_client" name="id_client" value="<?php echo $id ?>" />
                  </div>

                  <div class="form-group">
                  <label for="nom">Nom :</label>
                     <input type="text" id="nom"class="form-control p_input" name="nom" value="<?php echo $user['nom'] ?>" />
                    <span class="error-message" id="erreurNom" style="color: red"></span>
                  </div>

                  <div class="form-group"> 
                  <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" class="form-control p_input" name="prenom" value="<?php echo $user['prenom'] ?>" />
                    <span class="error-message" id="erreurPrenom" style="color: red"></span>
                  </div>

                  <div class="form-group"> 
                  <label for="email">Email :</label>
                  <input type="text" id="email" class="form-control p_input" name="email" value="<?php echo $user['email'] ?>" />
                    <span class="error-message" id="erreurEmail" style="color: red"></span>
                  </div>

                  <div class="form-group"> 
                  <label for="telephone">Téléphone :</label>
                  <input type="text" id="telephone" class="form-control p_input" name="tel" value="<?php echo $user['tel'] ?>" />
                    <span class="error-message" id="erreurTelephone" style="color: red"></span>
                  </div>
                  
                  <div class="form-group"> 
                  <label for="password">Mot de passe:</label>
                  <input type="text" id="password" class="form-control p_input"  name="password" placeholder="Laissez vide pour ne pas changer" />
                    <span class="error-message" id="erreurPassword" style="color: red"></span>
                  </div>

             
                
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                 
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
        var firstName = document.getElementById('prenom');
        var lastName = document.getElementById('nom');
        var email = document.getElementById('email');
        var phone = document.getElementById('telephone');
        var password = document.getElementById('password');

        clearErrorMessages();

        var isValid = true;

        if (firstName.value === "") {
            displayErrorMessage('erreurPrenom', 'Veuillez entrer votre prénom.');
            isValid = false;
        }

        if (lastName.value === "") {
            displayErrorMessage('erreurNom', 'Veuillez entrer votre nom.');
            isValid = false;
        }

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            displayErrorMessage('erreurEmail', 'Veuillez entrer une adresse e-mail valide.');
            isValid = false;
        }

        var phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phone.value)) {
            displayErrorMessage('erreurTelephone', 'Veuillez entrer un numéro de téléphone valide.');
            isValid = false;
        }

        if (password.value.length < 6) {
            displayErrorMessage('erreurPassword', 'Le mot de passe doit contenir au moins 6 caractères.');
            isValid = false;
        }

        if (isValid) {
            document.getElementById('updateForm').submit();
        }
    }

    document.getElementById('updateForm').addEventListener('submit', function (event) {
        event.preventDefault();
        validateForm();
    });
</script>

</body>
</html>

<?php
}
?>