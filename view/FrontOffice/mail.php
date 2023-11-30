<?php
 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";
require "C:/xampp/htdocs/fitness-gym-web/model/user.php";
 
//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {
    if(isset($_POST['email'])){
 
  $mail = new PHPMailer(true);
 
    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'laatigamen@gmail.com';   //SMTP write your email
    $mail->Password   = 'zimdraozkhrlnfpy';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    
 
    //Recipients
    $mail->setFrom('laatigamen@gmail.com',"fitness_gym"); // Sender Email and name
    $mail->addAddress($_POST['email']);     //Add a recipient email  
    $mail->addReplyTo('laatigamen@gmail.com',"gym"); // reply to sender email
 
    //Content
    $password=uniqid();
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
    $message="bonjour voici votre mot de passe : ".$password;
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = "RECUPERATION DE MOT DE PASSE";   // email subject headings
    $mail->Body    = $message; //email message
      
    // Success sent message alert
    if ($mail->send()) {
      echo
      " 
      <script> 
       alert('Message was sent successfully!');
       document.location.href = 'login.php';
      </script>
      ";
      $conn = config::getConnexion();
      $sql = "UPDATE client SET passworde = ? WHERE email = ?";
      $stmt = $conn->prepare($sql);
      
      // Bind values to the parameters
      $stmt->bindParam(1, $hashedPassword, PDO::PARAM_STR);
      $stmt->bindParam(2, $_POST['email'], PDO::PARAM_STR);
      
      // Execute the statement
      $stmt->execute();

  }

  else {
    echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
}
  
}
}

 