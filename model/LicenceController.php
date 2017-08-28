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

    public static function GetLicencesOwner(){
    $db=new database();
    $informations=array();
    $licences = $db->rowSelect(null,array("licence"),500);

    foreach ($licences as $key=>$value){
        $achat = $db->rowSelect(array("Achat_ID"=>$value['achat_ID']),array("achat"),1);

        $owner = $db->rowSelect(array("ID"=>$achat['User_ID']),array("user"),1);

        array_push($informations,array(

        "libelle"=>$value['Licence_libelle'],
        "Serial"=>$value['Licence_Serial'],
        "utilisateur"=>$owner['nickname']." ".$owner['name'],
        "date"=>date('d/m/Y',strtotime($achat['Date_achat'])),
        "Prix"=>$value['Licence_Prix'].""
        ));
    }
    return $informations;



    }

    public static function CreateLicence($id_user,$id_soft,$id_type_licence)
    {

        $db = new database();
        $soft = $db->rowSelect(array("ID" => $id_soft), array("logiciel_atout_sa"), 1);
        $type_licence = $db->rowSelect(array("Type_ID" => $id_type_licence), array("type_licence"), 1);
        $sql = "INSERT INTO achat VALUES (0,:User_ID,:Prix_total,:Date_achat);";
        $achat_args = array(
            "User_ID" => $id_user,
            "Prix_total" => 0,
            "Date_achat" => date("Y-m-d")
        );
        $achat_ID = $db->rowInsert($sql, $achat_args);
        $generated_key = LicenceGenerator::generate_key_string();
        $key_args = array(
            "Licence_Type" => $type_licence,
            "Licence_Serial" => $generated_key,
            "Licence_Prix" => 0,
            "Licence_Logiciel" => $id_soft,
            "achat_ID" => $achat_ID,
            "Licence_libelle" => $soft['Nom'] . " : licence " . $type_licence['Nom_type_licence']
        );

        $sql = "INSERT INTO licence VALUES (0,:Licence_Type,:Licence_Serial,:Licence_Prix,:Licence_Logiciel,:achat_ID,:Licence_libelle);";

        $req = $db->rowInsert($sql, $key_args);
        if ($req != false){
            return $generated_key;
        }
        else{
            return false;
        }


    }

}