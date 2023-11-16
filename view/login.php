<?php

class config
{
private static $pdo = null;
public static function getConnexion()
{
if (!isset(self::$pdo)) {
try {
self::$pdo = new PDO(
'mysql:host=localhost;dbname=fitness_gym',
'root',
'',
[
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]
);
//echo "connected successfully";
} catch (Exception $e) {
die('Erreur: ' . $e->getMessage());
}
}
return self::$pdo;
}
}

function elementExists($username)
{
    $conn = config::getConnexion();

    // Vérifier si l'email existe
    $sql = "SELECT * FROM client WHERE email = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return true;
    }

    // Vérifier si le nom d'utilisateur existe
    $sql = "SELECT * FROM client WHERE nom = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return true;
    }

    return false;
}

function password($username, $password)
{
    $conn = config::getConnexion();

    $sql = "SELECT * FROM client WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}


if(isset($_POST['username']) && isset($_POST['password'])){
if(elementExists($_POST['username'])){
    if(password($_POST['username'],$_POST['password'])){
     
      header('Location: site2/Acceuil.html');
      
                }
      else{
        echo '<div style="color: red; font-weight: bold;">mot de passe est incorrect.</div>';
      }
 
    }
  else{
    echo '<div style="color: red; font-weight: bold;">utilisateur est incorrect.</div>';
  }
}
  ?>






<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <style>
    .login-container {
      width: 300px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .login-container input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <form id='loginform' action=""method="post">
      <input type="text" placeholder="Username or Email" name="username" id="username">
      <span></span> 
      <input type="password" placeholder="Password" name="password" id="password">
      <span id="erreur"></span> 
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>
