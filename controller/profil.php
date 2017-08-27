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


    $user_orders=OrderController::getOrders($usercontroller->ID);
    $html="";
    $html.="<table class='table table-bordered table-striped'><tr><th>N° commande</th><th>Date achat</th><th>Produits</th><th>Prix total</th><th>Facture</th></tr>";
    foreach ($user_orders as $order){
    var_dump($order);
        $html.="<tr>";
        $html.="<td>".$order->Achat_ID."</td>";
        $html.="<td>".$order->date."</td>";
        $html.="<td>";
        foreach ($order->products as $product){
            $html.="<ul><li>Nom: ".$product['Licence_libelle']."</li>";
            $html.="<li>Clé: ".$product['Licence_Serial']."</li>";
            $html.="<li>Prix: ".$product['Licence_Prix']." €</li></ul>";
        }
        $html.="</td>";
        $html.="<td>".$order->Prix_total."</td>";
        $html.="<td><a class='btn btn-primary btn-responsive'>Voir la facture</a>";
        $html.="</tr>";



    }
    $html.="</table>";


    require WEBROOT.'/public/view_profil.php';
}
else{
    header("Location: ".URL);
}
