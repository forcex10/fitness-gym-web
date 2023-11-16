require "C:/xampp/htdocs/fitness-gym-web/model/user.php";
require "C:/xampp/htdocs/fitness-gym-web/controller/clientC.php";

$clientC=new UserC();



if(isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])&& isset($_POST['userType'])  ){
    if($_POST['userType']=="employe"){
        if(isset($_POST["diplome"])){
        $client=new User($_POST['lastName'],$_POST['firstName'],$_POST['email'],$_POST['phone'],NULL,$_POST['password'],$_POST['userType'],$_POST["diplome"],NULL);
        $newc=$clientC->addClient($client);
        echo '<div style="color: green; font-weight: bold;">compte ajoute avec succes.</div>';
        }
        else{ echo '<div style="color: red; font-weight: bold;">compte ajoute avec echec.</div>';}
    }
    else if($_POST['type']=="directeur"){
            if(isset($_POST['projetRc'])){
                $client1=new User($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['phone'],NULL,$_POST['password'],$_POST['userType'],NULL,$_POST['projetRc']);
                $newc=$clientC->addClient($client1);
                echo '<div style="color: green; font-weight: bold;">compte ajoute avec succes.</div>';
            }
            else {
                echo '<div style="color: red; font-weight: bold;">compte ajoute avec echec.</div>';
            }
      
    }
}