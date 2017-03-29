<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 05/03/2017
 * Time: 01:34
 */

class UserController
{
    
    private $name;
    private $nickname;
    private $email;
    private $adress;
    private $password;
    private $isConfirmed;
    private $privilege;
    public $isNull=true;

     function __construct($args=null){

     if ($args !=null){
         foreach($args as $key => $val) {
                 $this->{$key} = $val;
         }
         $this->isNull=false;
         $this->set();
     }

    }

    /*Gestion ustilisateur :
   a la connection , recuperer les données de l'user et les stocker dans la session par une instance
    */

    public function set()
    {
        $_SESSION['user']=serialize($this);
    }

    public function get()//ne sert a rien
    {
        $this->name=$_SESSION['user']['name'];
        $this->nickname=$_SESSION['user']['nickname'];
        $this->email=$_SESSION['user']['email'];
        $this->adress=unserialize($_SESSION['user']['adress']);
        $this->password=$_SESSION['user']['password'];
        $this->isConfirmed=$_SESSION['user']['isConfirmed'];
        $this->privilege=$_SESSION['user']['privilege'];
        $this->isNull=$_SESSION['user']['isNull'];
    }

    public function IsConfirmed()
    {
        return $this->isConfirmed;
    }

    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;
        //appel methode bdd update
        $this->set(); // a faire pour chaque setters
    }

    public function getPrivilege()
    {
        return $this->privilege;

    }

    public function setIsConfirmed($isConfirmed)
    {
        $this->isConfirmed = $isConfirmed;
        //updateUser("isConfirmed",$isConfirmed);
        $this->set();
    }

    public function updateUser($attr,$value)
    {
        //appel d'une methode(update) bdd update/put :
            //switch $attr
            //changement dans la base de donnée

        //return true/false
        

    }

    /*public function insertUser($user)
    {
        $userarray = new array();
        $user = serialize($user);
       // put($user,"utilisateur");
       return 
    }
*/
    public function setPassword($password)
    {
        $this->password = $password;
        $this->set();
    }

    public function setEmail($email)
    {
        $this->email = $email;
        $this->set();
    }

    public function getAdress()
    {
        return $this->adress;

    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;
        $this->set();
    }

    public function setName($name)
    {
        $this->name = $name;
        $this->set();
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
        $this->set();
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function toArray(){
        $array = array(
            'name'=>$this->getName(),
            'nickname'=>$this->getNickname(),
            'adress'=>$this->getAdress(),
            'email'=>$this->getEmail(),
            'password'=>$this->getPassword(),
            'privilege'=>$this->getPrivilege()
        );

        return $array;
    }

}

