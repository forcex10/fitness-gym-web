<?php 
require "logoogle.php";



use GuzzleHttp\Client;

$client = new Client([

    'timeout'  => 2.0,
]);
var_dump([
    'code' => $_GET['code'],
    'client_id' => GOOGLE_ID,
    'client_secret' => GOOGLE_SECRET,
    'redirect_uri' => "http://localhost/fitness-gym-web/view/FrontOffice/google.php",
    'grant_type' => 'authorization_code',
]);
try{
  $response = $client->request('GET', 'https://accounts.google.com/.well-known/openid-configuration');
$tokenEndpoint=json_decode((string)$response->getBody())->token_endpoint;
$response=$client->request('POST',$tokenEndpoint,[
  'form_params' => [
    'code' => $_GET['code'],
    'client_ID' => '208090102666-tu5qsjqvnfcuktkk0od63ca49ju8s9n9.apps.googleusercontent.com',
    'client_secret'=> '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',
    'redirect_uri'=>"http://localhost/fitness-gym-web/view/FrontOffice/google.php",
    'grant_type' => 'authorization_code'
]
]);


}


 catch (GuzzleHttp\Exception\ClientException $exception) {
    $responseBody = $exception->getResponse()->getBody()->getContents();
    echo "Error response from Google OAuth API:\n";
    echo $responseBody;

    // Enregistrez la réponse dans un fichier ou le journal pour un examen plus approfondi.
    file_put_contents('oauth_error_response.txt', $responseBody);

    // Vous pouvez également var_dump($exception) pour plus d'informations de débogage.
    var_dump($exception);
}
dd((string)$response->getBody());
?>