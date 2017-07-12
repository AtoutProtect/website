<?php
require "../webdefinition.php";
   if(isset($_GET['email']) && !empty($_GET['email']) && isset($_GET['key']) && !empty($_GET['key'])){
    $key =$_GET['key'];
    $email=$_GET['email'];
    $args=array(
       "Licence_Serial"=>$key,
       "email"=>$email
    );
    $db=new database();
    $licence=$db->callSP('check_licence',$args);
    if($licence != null){
        echo "Clé valide.";
    }
    else{
        echo "Clé invalide,veuillez reessayer...";
    }

}
else{
    echo "aucuns parametres...";
}
 
