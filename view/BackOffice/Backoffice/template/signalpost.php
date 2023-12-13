<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "C:/xampp/htdocs/fitness-gym-web/view/FrontOffice/phpmailer/src/Exception.php";
require "C:/xampp/htdocs/fitness-gym-web/view/FrontOffice/phpmailer/src/PHPMailer.php";
require "C:/xampp/htdocs/fitness-gym-web/view/FrontOffice/phpmailer/src/SMTP.php";

function envoie_mail($from_email, $to_email, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'activitargym@gmail.com';
        $mail->Password = 'eagv vkgn podl rgms';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->setFrom($from_email);
        $mail->addAddress($to_email); // Utilisation de la même adresse pour l'expéditeur et le destinataire
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->setLanguage('fr', '/optional/path/to/language/directory/');
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
if (envoie_mail('activitargym@gmail.com', $_POST['idpost'], 'avertissment', 'Le post que vous avez ajouter au forum contient du contenu inapproprié. Merci de respecter les règles du forum. Si cette situation persiste, une action pourrait être prise')) {
    // Redirection en cas de succès
    header('Location: listPost.php');
    exit(); // Assure que le script s'arrête ici pour éviter toute exécution supplémentaire
} else 


/*if (envoie_mail('saifeddinbenfredj@gmail.com', 'email du post', 'aaaa', 'bbbb')) {
    echo 'OK';
} else {
    echo "Une erreur s'est produite";
}*/

?>
