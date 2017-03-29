   <?php
   if(isset($_GET['key']) && isset($_GET['email']) ){
    $key =$_GET['key'];  
    $email=$_GET['email'];
    //selectionner la ligne dans commande quand clé==licence.serial et achat.licence_id=licence.licence.id
     // et achat.user_id ==user.user_id
    /*  $select0=rowSelect("achat",array("User_email" => $email)); 
      $user_id=rowSelect(achat, $select0['User_ID']);
      $select2=rowSelect(licence,array("Licence_serial"=>$key));
      $id_licence=$select2["Licence_ID"];*/

      $licence_proprietaire = rowSelect(achat,array("user_ID"=>$user_id,"licence_ID"=>$id_licence));
      if (/*$licence_proprietaire*/){
          echo "true";
      }
        
    else{
        echo "false";
    }
}

?>