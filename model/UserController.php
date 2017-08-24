<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 05/03/2017
 * Time: 01:34
 */

class UserController
{
    public $ID;
    public $password;
    public $email;
    public $name;
    public $nickname;
    public $privilege;
    public $adresse;




     function __construct($args=null){

     if ($args !=null){
         foreach($args as $key => $val) {
                 $this->{$key} = $val;
         }

     }

    }

    /*Gestion ustilisateur :
   a la connection , recuperer les données de l'user et les stocker dans la session par une instance
    */

public function connect(){
    $this->set();
}

public function exist(){
    $db=new database();
    $result=null;
    $userarray=(array)$this;
    foreach ($userarray as $key=>$value){
        if (empty($value)){
            unset($userarray[$key]);
        }
    }
    $result=$db->rowSelect($userarray,array('user'));

   return $result;
}
    public function set()
    {
        unset($_SESSION['user']);
        $_SESSION['user']=(array)$this;
    }

    public function get()//ne sert a rien
    {
        $this->name=$_SESSION['user']['name'];
        $this->nickname=$_SESSION['user']['nickname'];
        $this->email=$_SESSION['user']['email'];
        $this->adresse=unserialize($_SESSION['user']['adresse']);
        $this->password=$_SESSION['user']['password'];
        $this->isConfirmed=$_SESSION['user']['isConfirmed'];
        $this->privilege=$_SESSION['user']['privilege'];
        $this->isNull=$_SESSION['user']['isNull'];
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


    public function updateUser($attr,$value)
    {
        //appel d'une methode(update) bdd update/put :
            //switch $attr
            //changement dans la base de donnée

        //return true/false


    }

    public function editableInfos(){
        $editablesInformations = array(
        "name"=>$this->name,
        "nickname"=>$this->nickname,
        "email"=>$this->email,
        "adresse"=>$this->adresse
        );
        return $editablesInformations;
    }

    public function insertUser()
    {
        $db=new database();
        $result=null;
       $userarray=(array)$this;
        //$user = serialize($user);
        $sql="insert into user values (0,:password,:email,:name,:nickname,:privilege,:adresse);";

        if($db->rowInsert($sql,$userarray) !== false){
            $result = true;
        }
        else{
            $result = false;
        }
       return $result;
    }

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

    public function getadresse()
    {
        return $this->adresse;

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

    public function setadresse($adresse)
    {
        $this->adresse = $adresse;
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
            'adresse'=>$this->getadresse(),
            'email'=>$this->getEmail(),
            'password'=>$this->getPassword(),
            'privilege'=>$this->getPrivilege()
        );

        return $array;
    }

}

