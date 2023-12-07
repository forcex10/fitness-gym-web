<?php

$email=$_POST['email'];
if(isset($email)){
$ch=curl_init();
curl_setopt_array($ch,[
  CURLOPT_URL =>"https://emailvalidation.abstractapi.com/v1/?api_key=d9da5dada2844e248101623c59dd817f&email=$email",
  CURLOPT_RETURNTRANSFER =>true,
  CURLOPT_FOLLOWLOCATION => true
]);
$response= curl_exec($ch);
curl_close($ch);
$data=json_decode($response,true);

if($data['deliverability']==="UNDELIVERABLE"){
  exit("Undeliverable");
}
if($data['is_disposable_email']["value"]===true){
  exit("Disposable");
}
echo"valid email";
}
else{
  echo"";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Email</title>
</head>
<body>

    <h1>Formulaire Email</h1>

    <form action="" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <input type="submit" value="Envoyer">
    </form>

</body>
</html>
