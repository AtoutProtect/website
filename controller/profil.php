<?php




if(isset($_SESSION['user']) && !empty(isset($_SESSION['user']))){
$arrayUser= $_SESSION['user'];
 $usercontroller=new UserController($arrayUser);
 $informationsForm="<table class='table table-striped table-sm'>";
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

    if ($usercontroller->privilege == 1){
        $informationsForm.="<div class='col-lg-12'>";


        $informationsForm.="<a href='".URL."/controller/excel.php' class='btn btn-primary btn-responsive' style='margin-bottom:10px;'>Exporter données clients</a> ";
        $informationsForm.="<a href='".URL."/controller/licencesexcel.php' class='btn btn-primary btn-responsive' style='margin-bottom:10px;'>Exporter données licences</a></div> ";
        $informationsForm.="<div class='col-lg-12'> <form style='border:solid 1px #ddd;padding: 10px;margin-bottom:10px;' method='post' id='createlicence' action='/createlicence'><h3>Créer une licence :</h3> ";
        $informationsForm.="<input type='text' name='user' placeholder='ID du client...'>";
        $informationsForm.="<select name='type_licence' class=\"form-control\"' id='type_licence'>";
        foreach (ProductController::getTypeLicence() as $licence){
            $informationsForm.="<option value='".$licence['Type_ID']."'>".$licence['Nom_type_licence']."</option>";
        }
        $informationsForm.="</select>";
        $informationsForm.="<select name='logiciel' class=\"form-control\"' id='logiciel'>";
        $productList = ProductController::getAllProducts();
        foreach ($productList as $soft){
            $informationsForm.="<option value='".$soft['ID']."'>".$soft['Nom']."</option>";
        }
        $informationsForm.="</select><button type='submit' class='btn btn-primary btn-responsive'>Créer licence</button> </form></div>";

    }

        $informationsForm.="<div class='col-lg-12'>";
        $informationsForm.="<form method=\"post\" action='".URL."'>
    <button style='margin-top:5px;' name=\"deconnection\" value=\"1\" href=\"#\" type=\"submit\" class=\"btn btn-primary\">Se déconnecter</button>
    </form></div>";


    $user_orders=OrderController::getOrders($usercontroller->ID,null);
    $html="";
    $html.="<table class='table table-bordered table-striped'><tr><th>N° commande</th><th>Date achat</th><th>Produits</th><th>Prix total</th><th>Facture</th></tr>";
    foreach ($user_orders as $order){

        $html.="<tr>";
        $html.="<td>".$order->Achat_ID."</td>";
        $html.="<td>".date("d/m/Y",strtotime($order->Date_achat))."</td>";
        $html.="<td>";
        foreach ($order->products as $product){
            $html.="<ul><li><b>Nom: </b>".$product['Licence_libelle']."</li>";
            $html.="<li><b>Clé: </b> ".$product['Licence_Serial']."</li>";
            $html.="<li><b>Prix: </b>".$product['Licence_Prix']." €</li></ul>";
        }
        $html.="</td>";
        $html.="<td>".$order->Prix_total." €</td>";
        $html.="<td><a class='btn btn-primary btn-responsive' href='".URL."/controller/pdf.php?id=".$order->Achat_ID."'>Voir la facture</btn>";
        $html.="</tr>";



    }
    $html.="</table>";




    require WEBROOT.'/public/view_profil.php';
}
else{
    header("Location: ".URL);
}
