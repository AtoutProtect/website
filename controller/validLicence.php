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
        echo date("d/m/Y");
    }
    else{
        echo "false";
    }

}
else{
    echo "false";
}
 
