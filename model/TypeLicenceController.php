<?php

class TypeLicenceController
{

    public $Type_ID;
    public $Nom_type_licence;
    public $Coeficient_prix;



    function __construct($args=null){

        if ($args !=null){
            foreach($args as $key => $val) {
                $this->{$key} = $val;
            }
            $this->set();
        }

    }

    public function set()
    {
        unset($_SESSION['TypeLicence']);
        $_SESSION['TypeLicence']=$this;
    }

    public static function getLicence($id){

        $db=new database();
        $result=null;
        $args=array("Type_ID"=>$id);
        $result=$db->rowSelect($args,array('type_licence'),1);

        return $result;

    }


    public function ResetCart()
    {
        //vider $products
        //mettre empty a true
        //mettre
    }



}