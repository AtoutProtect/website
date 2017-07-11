<?php
require "../webdefinition.php";/*Fichier a appeler uniquement dans l'index ainsi que les scripts php appelés par ajax */



if(!empty($_POST['name']) && !empty($_POST['value']) && isset($_SESSION['user']) ) {
    $key = $_POST['name'];
    $value = $_POST['value'];
    $usercontroller=new UserController(unserialize($_SESSION['user']));
$args=array(
$key=>$value

);
    print_r($args);
$conditions=array(
"ID"=>$usercontroller->ID
);
print_r($conditions);
$db = new database();
if($db->rowUpdate($args,'user',$conditions)){
/*Mise a jour de l'utilisateur coté serveur:*/
$usercontroller->{$key}=$value;
$usercontroller->set();
    print_r("tout est ok");

}



}
else{
    print_r("erreur");
}









