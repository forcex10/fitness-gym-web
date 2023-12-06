<?php
 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

 
//Create an instance; passing `true` enables exceptions

      function email_send($email){
      
 
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
    $mail->addAddress($email);     //Add a recipient email  
    $mail->addReplyTo('laatigamen@gmail.com',"gym"); // reply to sender email
 
    //Content
   
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = "VERIFICATION EMAIL";   // email subject headings

    $htmlBody = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vérification de l\'adresse e-mail</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                color: #333;
            }
            p {
                color: #666;
            }
            a {
                display: inline-block;
                padding: 10px 20px;
                background-color: #007BFF;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Bienvenue sur notre site</h2>
            <p>Merci de vous être inscrit. Veuillez cliquer sur le lien ci-dessous pour vérifier votre adresse e-mail:</p>
            <p><a href="http://localhost/fitness-gym-web/view/FrontOffice/typeU.php " >Vérifier mon adresse e-mail</a></p>
        </div>
    </body>
    </html>
';
    $mail->Body    = $htmlBody;
 //email message
      
    // Success sent message alert
    if ($mail->send()) {
      echo
      " 
      <script> 
       alert('Message was sent successfully!');
       document.location.href = 'login.php';
      </script>
      ";
  

  }

  else {
    echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
}
  
}


 