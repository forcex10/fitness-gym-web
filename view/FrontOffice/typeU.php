<?php

require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";

session_start();


$email=$_SESSION['email'];

$_SESSION['type']="clientV";
 


    $conn = config::getConnexion();
    $sql = "UPDATE client SET typee = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    
    // Bind values to the parameters
    $stmt->bindParam(1, $_SESSION['type'], PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    
    // Execute the statement
    $stmt->execute();


   header('Location: login.php');
?>