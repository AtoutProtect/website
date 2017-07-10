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
            $dbh = new PDO('mysql:host=localhost;dbname=bdd_ap', $user='root', $pass='');
        }
        catch (PDOException $e)
        {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }




    //Met a jour la cle en parametre selon la valeur passé en parametre
    /*public  function update($array_data,$table)
    {

        $db = Database::getDbConfig();

        foreach ($array_data as $data => $value)
        {
            $stmt = $db->prepare("UPDATE :table SET :key = :value");
            $stmt->bindParam(':key',$data);
            $stmt->bindParam(':value',$value);
            $res = $stmt->execute();
        }
        if($res){
            return $res;
        }
        else{
            return false;
        }

    }

    //Recupere l'utilisateur selon le mail passé en parametre
    public  function getUser($email){

        $db = Database::getDbConfig();
        $stmt = $db->prepare("SELECT * FROM user WHERE User_email = :email");
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        $res = $stmt->fetch();
        if ($res){
            return $res;
        }
        else{
            return false;
        }
    }

    //Recupere le logiciel selon son id passé en parametre
    public  function getProduct($idlogiciel){

        $db = Database::getDbConfig();
        $stmt = $db->prepare("SELECT Logiciel_Nom FROM logiciel_atout_sa WHERE Logiciel_ID = :idlogiciel");
        $stmt->bindParam(':idlogiciel',$idlogiciel);
        $res = $stmt->execute();
        if($res){
           return $res;
        }
        else{
            return false;
        }

    }

    //Recupere les n entreés de la table passé en parametre
    public  function read($table,$nb){

        $db = Database::getDbConfig();
        $stmt = $db->prepare("SELECT * FROM :table LIMIT :nb");
        $stmt->bindParam(':table',$table);
        $stmt->bindParam(':nb',$nb);
        $res = $stmt->execute();

        if($res){
            return $res;
        }
        else{
            return false;
        }

    }

     //Insert l'instance passé en parametre dans la table passée en parametre
    /* public  function put($table,$instance){

        $db = Database::getDbConfig();

        switch ($table) {

            case 'achat':
                 $stmt = $db->prepare("INSERT INTO :table () VALUES () ;");
                break;

            case 'licence':
                $stmt = $db->prepare("INSERT INTO  () VALUES () ;");
                break;

            case 'panier':
                $stmt = $db->prepare("INSERT INTO  () VALUES () ;");
                break;

            case 'prix':
                $stmt = $db->prepare("INSERT INTO  () VALUES () ;");
                break;

            case 'type_licence':
                $stmt = $db->prepare("INSERT INTO  () VALUES () ;");
                break;

            case 'user':
                $stmt = $db->prepare("INSERT INTO  () VALUES () ;");
                break;

        $stmt->bindParam(':',$u);
        $stmt->execute();
        $res = $stmt->fetch();
        if ($res){
            return $res;
        }
        else{
            return false;
        }
    }

    //Insert dans la table utilisateur l'instance utilisateur passé en parametres
    public  function createUser ($array){

        $db = Database::getDbConfig();
        $stmt = $db->prepare("INSERT INTO user (User_password,User_email,User_name,User_nickname,User_privilege,User_adresse) VALUES (:password,:email,:name,:nickname,:privilege,:adresse)");
        $stmt->bindParam(':password',$array["password"]);
        $stmt->bindParam(':email',$array["email"]);
        $stmt->bindParam(':name',$array["name"]);
        $stmt->bindParam(':nickname',$array["nickname"]);
        $stmt->bindParam(':privilege',$array["privilege"]);
        $stmt->bindParam(':adresse',$array["adresse"]);

        $stmt->execute();
        $res = $stmt->fetch();
        if ($res){
            return $res;
        }
        else{
            return false;
        }
    }




    public  function getKey ($key)
    {

        $db = Database::getDbConfig();
        $stmt = $db->prepare("SELECT * FROM licence WHERE key = :key ");
        $stmt->bindParam(':key',$key);
        $stmt->execute();
        $res = $stmt->fetch();
        if ($res){
            return $res;
        }
        else{
            return false;
        }
    }*/



    public  function rowInsert($sql,$array_data=null)
    {

        $db = new PDO('mysql:host=localhost;dbname=bdd_ap','root','');
        $v = '1111222333444';
        print_r($db);
        print_r($sql);
        //$dbh = new PDO('mysql:host='.$VALEUR_hote.';port='.$VALEUR_port.';dbname='.$VALEUR_nom_bd, $VALEUR_user, $VALEUR_mot_de_passe);
        $sth = $db->prepare($sql);
       // print_r($sth);
        if($array_data != null){
            foreach($array_data as $key=>$value){
               // print_r(':'.$key." => ".$value."<br>");
                if(empty($value)){
                    $value="";
                }
                $sth->bindParam(':'.$key,$value, PDO::PARAM_STR);
            }
        }

       // print_r($sth);
        $sth->execute();





     /*   $db = Database::getDbConfig();
        $requete = "INSERT INTO :table VALUES(";

        foreach ($array_data as $data => $value)
        {
            $requete.=$value." ";
        }
        $requete.=")";
        $stmt = $db->prepare($requete);
        $stmt->bindParam(':table',$table);
        $res = $stmt->execute();

        if($res){
            return $res;
        }
        else{
            return false;
        }*/


    }

    public  function rowUpdate($table,$array_data)
    {

        $db = Database::getDbConfig();

        foreach ($array_data as $data => $value)
        {
            $stmt = $db->prepare("UPDATE :table SET :key = :value");
            $stmt->bindParam(':key',$data);
            $stmt->bindParam(':value',$value);
            $res = $stmt->execute();
        }
        if($res){

            return $res;
        }
        else{
            return false;
        }
    }


    public  function rowDelete($table,$array_data)
    {
        $db = Database::getDbConfig();

        foreach ($array_data as $data => $value)
        {
            $stmt = $db->prepare("DELETE FROM :table WHERE :key = :value");
            $stmt->bindParam(':key',$data);
            $stmt->bindParam(':value',$value);
            $res = $stmt->execute();
        }
        if($res){
            return $res;
        }
        else{
            return false;
        }

    }

    public  function rowSelect($sql,$args=null){

        $db = new PDO('mysql:host=localhost;dbname=bdd_ap','root','');
        $v = '1111222333444';
        //$dbh = new PDO('mysql:host='.$VALEUR_hote.';port='.$VALEUR_port.';dbname='.$VALEUR_nom_bd, $VALEUR_user, $VALEUR_mot_de_passe);
        $sth = $db->prepare("SELECT * FROM licence");
        $sth->execute();
        $result = $sth->fetchAll();
        return($result);

        // $sth = $db->prepare($sql);
        // if($args!=null){
        // $result = $sth->execute($args);
        // }
        // else{
        // $result = $sth->execute();
        // }
        // $res = $result->fetch();


        // return $res;

    }


    /* public  function getTable($table){


     }
*/
}

