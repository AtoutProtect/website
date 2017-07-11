<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 07/07/2017
 * Time: 14:17
 */
require "../webdefinition.php";
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
         echo "
 <script>
  $('.messageresult').empty();
 $('.messageresult').append('vous etes desormais inscrit.');
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
