<?php


 function insertUser($user)
    {
       
        $user1 = serialize($user);
       // put($user,"utilisateur");
       return user1;
    }

 $userController = new UserController(array(
         'name'     => 'adrien',
         'nickname' => 'carre',
         'email'    => 'adrien.tigram@hotmail.fr',
         'adress'   => '2 impasse du tarbezou',
         'privilege'=> 'administrateur'
         )
);


     $test = insertUser($userController);
     

     var_dump($test);
require WEBROOT.'/public/view_home.php';