<?php
require "../webdefinition.php";/*Fichier a appeler uniquement dans l'index ainsi que les scripts php appelés par ajax */



if(!empty($_POST['name']) && !empty($_POST['value']) && isset($_SESSION['user']) ) {
    $key = $_POST['name'];
    $value = $_POST['value'];
    $usercontroller=new UserController($_SESSION['user']);

$args=array(
$key=>$value

);
var_dump($args);
$conditions=array(
"ID"=>$usercontroller->ID
);
$db = new database();
if($db->rowUpdate($args,'user',$conditions)){
/*Mise a jour de l'utilisateur coté serveur:*/
$usercontroller->{$key}=$value;
$usercontroller->set();

}



}
else{
}









