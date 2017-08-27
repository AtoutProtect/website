<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 07/07/2017
 * Time: 14:17
 */
require "../webdefinition.php";
require "swift_required.php";
 if( !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['passw']) ){
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$passw = sha1($_POST['passw']);


     $userController = new UserController(array(
             'ID'       =>"0",
             'name'     => $prenom,
             'nickname' => $nom,
             'email'    => $email,
             'adresse'   => 'null',
             'privilege'=> '0',
             'password'=>$passw
         )
     );
     if($userController->insertUser()){
/*$transport = new Swift_SmtpTransport('smtp.example.org', 25);
$transport->setUsername("");
$transport->setPassword("");
$mailer = new Swift_Mailer($transport);
// Create a message
         $message = (new Swift_Message("Confirmation d'inscription AtoutProtect"))
             ->setFrom(['john@doe.com' => 'John Doe'])
             ->setTo([$email => $prenom." ".$nom])
             ->setBody("<html><head><head></head><body><h1>Confirmation d'inscription sur AtoutProtect</h1><p>Vous etes bien inscrit sur le site d'Atout-Protect, vous pouvez dés a présent commander sur notre site</p></body></html>")
         ;

// Send the message
         $result = $mailer->send($message);*/

         echo "
 <script>
  $('.messageresult').empty();
 $('.messageresult').append('inscription effectué.Vous pouvez dés a présent vous connecter et profiter de la boutique.');
         $('.modal').modal('show');
     </script>
";
     }
     else{
         echo "
 <script>
  $('.messageresult').empty();
 $('.messageresult').append('Une erreur est survenu, merci de reessayer.');
         $('.modal').modal('show');
     </script>
";
     }


 }
 else{

     echo "
 <script>
 $('.messageresult').empty();
 $('.messageresult').append('Veuillez saisir tous les champs requis pour l\'inscription');
         $('.modal').modal('show');
     </script>
";
 }
