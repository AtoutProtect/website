<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 22/08/2017
 * Time: 13:44
 */

class LicenceController
{

public $Licence_ID;
public $Licence_Type;
public $Licence_Serial;
public $Licence_Prix;
public $Licence_Logiciel;
public $achat_ID;
public $Libelle_licence;


    function __construct($args=null){

        if ($args !=null){
            foreach($args as $key => $val) {
                $this->{$key} = $val;
            }

        }

    }



}