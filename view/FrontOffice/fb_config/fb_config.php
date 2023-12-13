<?php
require_once "vendor/autoload.php";

session_start();

$fb=new \Facebook\Facebook([
    'app_id'=>'1347845145925987',
    'app_secret'=>'e715333ee5f8cccf1bf9d02276f6b57a',
    'default_graph_version'=>'v2.5',
]);
$helper=$fb->getRedirectLoginHelper();

if(isset($_GET['code'])){
if(isset($_SESSION['access_token'])){
    $acces_token=$_SESSION['acces_token'];
}
else
{
    $acces_token=$helper->getAcessToken();
    $_SESSION['acces_token']=$acces_token;
    $fb->setDefalutAccessToken($_SESSION['access_token']);

}
$_SESSION['nom']='';
$_SESSION['email']='';

$graph_response=$fb->get("me?fields=name,email",$acces_token);
$facebook_user_info=$graph_response->getGraphUser();
$_SESSION['nom']=$facebook_user_info['name'];
$_SESSION['email']=$facebook_user_info['email'];
$requestPicture=$fb->get("me/picture?redirect=false&height=150",$acces_token);
$fbpic=$requestPicture->getGraphUser();
$_SESSION['pdp']=$fbpic;
$permissions=['email'];
$login_url=$helper->getLoginUrl("localhost/fitness-gym-web/view/FrontOffice/fb_config/",$permissions);
}
?>