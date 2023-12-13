<?php
session_start();


require "logoogle.php";
require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";



$userC= new UserC();
$errors = array();

if(isset($_POST['recup'])){
    if(isset($_POST['email'])){
        $user=$userC->elementExists($_POST['email']);
    



if($user!=NULL){
    if(isset($_POST['password'])){
        if(password_verify($_POST['password'],$user['passworde'])){
          if (isset($_POST['remember']) && $_POST['remember'] == 'on') {
            // Utilisateur a coché la case "Se souvenir de moi"
            setcookie("email", $_POST['email'], time() + 30 * 24 * 3600,'/','localhost',false,true);
            setcookie("password", $_POST['password'], time() + 30 * 24 * 3600,'/','localhost',false,true);}

            $_SESSION['id']=$user['id_client'];
            $_SESSION['nom']=$user['nom'];
            $_SESSION['prenom']=$user['prenom'];
            $_SESSION['password']=$_POST['password'];
            $_SESSION['email']=$user['email'];
            $_SESSION['tel']=$user['tel'];
            $_SESSION['pdp']=$user['pdp'];
            $_SESSION['type']=$user['typee'];
            if($user['typee']=="clientV"){
            header('Location:activitar-master/index.php');}
            else if($user['typee']=="client"){
              $errors['verif'] = 'verifiez votre compte.';
            }
             if($user['typee']==="admin"){
              header('Location:../BackOffice/Backoffice/template/listUser.php');
            }
    
    
        }
        else{
          $errors['password'] = 'mot de passe incorrect.';
        }
    }
   
             
     
    }
      
 else if( isset($_COOKIE['email'],$_COOKIE['password'])){
    $user=$userC->elementExists($_COOKIE['email']);
    $_SESSION['id']=$user['id_client'];
    $_SESSION['nom']=$user['nom'];
    $_SESSION['prenom']=$user['prenom'];
    $_SESSION['password']=$user['passworde'];
    $_SESSION['email']=$user['email'];
    $_SESSION['tel']=$user['tel'];
    $_SESSION['pdp']=$user['pdp'];
    
    if($user['typee']=="clientV"){
      header('Location:activitar-master/index.php');}
      else if($user['typee']=="client"){
        $errors['verif'] = 'verifiez votre compte.';
      }
       if($user['typee']==="admin"){
        header('Location:../BackOffice/Backoffice/template/listUser.php');
      }

    
  }
  else {
    $errors['email'] = 'Email inexistant';
  }
 
    }


}
// else{
//   echo"champs indéfini";
// }
  ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ACTIVITAR</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../BackOffice/Backoffice/template/assets/css/style1R.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../BackOffice/Backoffice/template/assets/images/logo2.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
              <p style="color: green"><?php echo isset($errors['verif']) ? $errors['verif'] : '';?></p>
                <center><h2 class="card-title text-left mb-3 text-warning">Login</h2></center>
                <form  action="" method="post">

                  <div class="form-group">
                 

                    <label class="text-info">email :</label>
                    <input type="text" class="form-control p_input text-light" placeholder=" Email" name="email" id="email" value= "<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                    <span><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span> 
                  </div>

                  <div class="form-group">
                    <label class="text-info">Password :</label>
                    <input type="password" class="form-control p_input text-light" placeholder="Password" name="password" id="password" value= "<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
                    <span id="erreur"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></span>
                  </div>

                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="remember" id="remember"class="form-check-input"> Remember me </label>
                    </div>

                    <a href="mdpOublié.php" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn" name="recup">Login</button>
                  </div>
                 
                  <p class="sign-up">Don't have an Account?<a href="register.php"> Sign Up</a></p>
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


  </body>
</html>