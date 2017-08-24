<?php

class ProductController
{

    public $ID;
    public $nom;
    public $base_prix;
    public $type_licence;
    public $ID_type_licence;
    public $categorie;
    public $prix;
    public $prix_total;

    
    public static function getAllProducts(){

        $arrayProduct=null;
        $db = new database();
        $products= $db->rowSelect(null,array('logiciel_atout_sa'),100);
        return $products;

    }

    public static function getTypeLicence(){

        $db = new database();
        $licences= $db->rowSelect(null,array('type_licence'),100);
        return $licences;
    }


    }


