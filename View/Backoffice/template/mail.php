<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create an instance; passing true enables exceptions
if (isset($_POST["send"])) {
    if (isset($_POST['email'])) {

        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();                              // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                    // Enable SMTP authentication
        $mail->Username   = 'seif.dallelou@gmail.com'; // SMTP write your email
        $mail->Password   = 'cnzbwfiazsjeoict';      // SMTP password
        $mail->SMTPSecure = 'ssl';                   // Enable implicit SSL encryption
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('seif.dallelou', "fitness_gym"); // Sender Email and name
        $mail->addAddress($_POST['email']);                      // Add a recipient email
        $mail->addReplyTo('seif.dallelou@gmail.com', "gym");        // Reply to sender email

        // Content
        $message = "Bonjour, vous avez reçu une notification de l'administrateur.";

        $mail->isHTML(true);               // Set email format to HTML
        $mail->Subject = "Notification de l'administrateur";   // Email subject headings
        $mail->Body    = $message;                            // Email message

        // Check if the email was sent successfully
        if ($mail->send()) {
            echo "
            <script> 
                alert('Notification sent successfully!');
                document.location.href = 'admin_dashboard.php';
            </script>";
        } else {
            echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
        }
    }
}
?>
