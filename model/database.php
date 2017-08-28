<?php
/**
 * User: Vincent
 * Date: 04/01/2017
 */


class database {

    //Gere la connection a la bdd
    public static function connect_bdd()
    {
        try {
            $dbh = new PDO('mysql:host=mysql-atout-protect.alwaysdata.net;dbname=atout-protect_bdd','136225_root','1c1a2r1e');

            //$dbh = new PDO('mysql:host=localhost;dbname=bdd_ap', $user='root', $pass='');
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

public function callSP($name,$params){
    $result =null;
    $array_keys = array_keys($params);
    $last_key = end($array_keys);
    $db = new PDO('mysql:host=mysql-atout-protect.alwaysdata.net;dbname=bdd_ap','root','');
    $sql="CALL ".$name."(";
    foreach ($params as $key=>$value){
        $sql.=":".$key;
        if($last_key != $key){
            $sql.=",";
        }
    }
    $sql.=")";
    $sth = $db->prepare($sql);
    $sth->execute($params);
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
}

    public  function rowInsert($sql,$array_data=null)
    {

    $result = false;
    // $db = new PDO('mysql:host=localhost;dbname=bdd_ap','root','');
    $db = new PDO('mysql:host=mysql-atout-protect.alwaysdata.net;dbname=atout-protect_bdd', '136225_root', '1c1a2r1e');
    $sth = $db->prepare($sql);


    if ($array_data != null) {
        if (isset($array_data['ID'])) {
            unset($array_data['ID']);
        }
        if ($sth->execute($array_data)) {
            $result = $db->lastInsertId();
        } else {
            $result = false;
        }


    } else {
        if ($sth->execute()) {
            $result = $db->lastInsertId();
        } else {
            $result = false;
        }

    }

    return $result;
}


    

    public  function rowUpdate($args,$table,$conditions=null)
    {
    $result=null;
        $db = new PDO('mysql:host=mysql-atout-protect.alwaysdata.net;dbname=atout-protect_bdd','136225_root','1c1a2r1e');

        //$db = new PDO('mysql:host=localhost;dbname=bdd_ap','root','');
        $array_keys = array_keys($args);
        $last_key = end($array_keys);
       $sql="update ".$table." set ";
       foreach ($args as $key=>$value){
           $sql.=$key." = :".$key;
           if($key != $last_key){
               $sql.=" and ";
           }
       }
       if ($conditions != null){
           $sql.=" where ";
           $array_keys = array_keys($conditions);
           $last_key = end($array_keys);

           foreach ($conditions as $key=>$value){
               $sql.=$key." = :".$key;
               if($key != $last_key){
                   $sql.=" and ";
               }
           }

       }
        $sth = $db->prepare($sql);
        $params =array_merge($args, $conditions);
        if ($sth->execute($params))
            $result=true;
        else{
            $result=false;
        }

return $result;
    }

    public  function rowSelect($args=null,$tables,$limit=1){
        $db = new PDO('mysql:host=mysql-atout-protect.alwaysdata.net;dbname=atout-protect_bdd','136225_root','1c1a2r1e');

        //$db = new PDO('mysql:host=localhost;dbname=bdd_ap','root','');
        $array_keys = array_keys($tables);
        $last_key = end($array_keys);
        $sql="select * from ";
        foreach ($tables as $key=>$value){
            $sql.=$value;
            if($key != $last_key){
                $sql.=",";
            }
        }
        if($args != null){
            $sql.=" where ";
            $array_keys = array_keys($args);
            $last_key = end($array_keys);
            foreach ($args as $key=>$value){
                if(!empty($value)){
                    $sql.=$key." = :".$key;
                    if($key != $last_key){
                        $sql.=" AND ";
                    }
                }

            }

            if ($limit==1){

                $sql.=" limit 1";
                $sth = $db->prepare($sql);
                $sth->execute($args);
                $result = $sth->fetch(PDO::FETCH_ASSOC);

            }
            else{
                $sql.="";
                $sth = $db->prepare($sql);
                $sth->execute($args);
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

            }
        }
        else{
            if ($limit==1){
                $sql.=" limit 1";
                $sth = $db->prepare($sql);
                $sth->execute();
                $result = $sth->fetch(PDO::FETCH_ASSOC);
            }
            else{
                $sql.="";
                $sth = $db->prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        return($result);


    }

    public  function rowDelete($conditions,$table)
    {
        $result=null;
        $db = new PDO('mysql:host=mysql-atout-protect.alwaysdata.net;dbname=atout-protect_bdd','136225_root','1c1a2r1e');

        //$db = new PDO('mysql:host=localhost;dbname=bdd_ap','root','');

        $sql="delete from ".$table." where ";
            $array_keys = array_keys($conditions);
            $last_key = end($array_keys);
            foreach ($conditions as $key=>$value){
                $sql.=$key." = :".$key;
                if($key != $last_key){
                    $sql.=" and ";
                }
            }
        $sth = $db->prepare($sql);
        if ($sth->execute($conditions))
            $result=true;
        else{
            $result=false;
        }

        return $result;

    }
}

