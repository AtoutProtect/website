<?php


if(isset($_SESSION['user']) && !empty(isset($_SESSION['user']))){
$arrayUser= unserialize($_SESSION['user']);
 $usercontroller=new UserController($arrayUser);
 $informationsForm="<table class='table table-striped table-sm'>";
print_r($usercontroller);
    foreach ($usercontroller->editableInfos() as $key=>$value){
if (empty($value) || !isset($value) || $value=="null"){
    $value="entrer votre ".$key;
}
        $informationsForm.="<tr>";
        $informationsForm.="<td><label for='".$key."'>".$key."</label></td>";
        $informationsForm.="<td><a href=\"#\" id=\"".$key."\" data-type=\"text\" data-pk=\"1\" data-url='controller/editInformation.php' data-title=\"Entrer votre ".$key."\">".$value."</a></td>";
     //   $informationsForm.="<input class='form-control' disabled='disabled' type='text'  value='".$value."' name='".$key."' id='".$key."'/>";
        $informationsForm.="</tr>";
    }
    $informationsForm.="</table>";


    require WEBROOT.'/public/view_profil.php';
}
else{
    header("Location: ".URL);
}
