<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 22/08/2017
 * Time: 13:44
 */

class AchatController
{

    public $soft_name;
    public $type_licence;
    public $serial;
    public $prix;


    function __construct($args=null){

        if ($args !=null){
            foreach($args as $key => $val) {
                $this->{$key} = $val;
            }

        }

    }



}