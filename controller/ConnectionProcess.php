<?php
require "../webdefinition.php";/*Fichier a appeler uniquement dans l'index ainsi que les scripts php appelés par ajax */



if(!empty($_POST['email']) && !empty($_POST['passw']) ){
    $email=$_POST['email'];
    $passw = sha1($_POST['passw']);

    $userController = new UserController(array(
            'password'=>$passw,
            'email'    => $email,
        )
    );
    $existingUser = $userController->exist();
if(!empty($existingUser)){
print_r($existingUser);
$userController = new UserController($existingUser);
$userController->connect();
echo"Vous etes maintenant connecté...<script>location.reload();</script>";

}
else{
    echo"Mauvais mot de passe ou adresse mail, veuillez reessayer...";
}
}
else{
    echo"veuillez entrer vos identifiants...";
}

    // $test = insertUser($userController);
     

   //  var_dump($test);
/*
if(isset($_POST['mail']) && isset($_POST['password']))
{

}
else
{
    
}
*/





