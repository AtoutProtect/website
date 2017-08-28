<?php
if (isset($_SESSION['user'])){
    $currentUser=new UserController($_SESSION['user']);
    $html='';
    if(isset($_POST['user']) && isset($_POST['type_licence']) && isset($_POST['logiciel'])){
        $user=$_POST['user'];
        $type_licence=$_POST['type_licence'];
        $logiciel=$_POST['logiciel'];
        $licence=LicenceController::CreateLicence($user,$logiciel,$type_licence);
        $html.='';
        if ($licence != false){
            $html.="<div class='col-lg-12 text-center'><div class=\"alert alert-success\"> La clé a bien été crée, veuillez la noter : ".$licence."</div></div>";

        }
        else{
            $html.="<div class='col-lg-12 text-center'><div class=\"alert alert-danger\"> B Un probleme est survenu , veuillez reessayer...</div></div>";

        }
    }
    else{
        $html.="<div class='col-lg-12 text-center'><div class=\"alert alert-danger\"> Un probleme est survenu , veuillez reessayer...</div></div>";

    }

    require WEBROOT.'/public/view_createlicence.php';
}
else{

}
