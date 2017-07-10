<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 05/03/2017
 * Time: 01:34
 */

class UserController
{
    private $password;
    private $email;
    private $username;
    private $nickname;
    private $privilege;
    private $adress;




     function __construct($args=null){

     if ($args !=null){
         foreach($args as $key => $val) {
                 $this->{$key} = $val;
         }
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

    public function insertUser()
    {
        $db=new database();
        $result=null;
        $userarray = (array)$this;
        //$user = serialize($user);
        $sql="insert into user values ('','".$this->password."','".$this->email."','".$this->username."','".$this->nickname."','".$this->privilege."','".$this->adress."');";
        if($db->rowInsert($sql)){
            $result = true;
        }
        else{
            $result = false;
        }
        print_r($result);
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
        return $this->username;
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

