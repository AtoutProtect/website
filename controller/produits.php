<?php
$productList = ProductController::getAllProducts();

if ($productList != null){
$html="";
    foreach ($productList as $soft){
        $html.=" <div class=\"col-lg-6\"><table><tr>";
        $html.="<td><img src='".URL."/public/img/soft1.jpg'/></td>";
        $html.="  <td class=\"\"><h2>".$soft['Nom']."</h2></td>";
        $html.="<td class=\"\"> 
                                      <select class=\"form-control\" id='sel".$soft['ID']."'>
                                                        <option value=\"\" selected disabled>Selecionnez licence...</option>";
                                                        foreach (ProductController::getTypeLicence() as $licence){
                                                            $html.="  <option value='".$licence['Type_ID']."'>".$licence['Nom_type_licence']."</option>";
                                                        }
        $html.="</select></td>";
        $html.="<td class=\"\"><button onclick='addtocart(this)' id='".$soft['ID']."' href=\"\" class=\"btn btn-primary button_add\">Ajouter</button></td>";
        $html.= "</table></div>";
          }
}
require WEBROOT.'/public/view_produits.php';