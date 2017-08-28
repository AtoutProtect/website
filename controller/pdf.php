<?php
require"../webdefinition.php";
require 'pdfcrowd.php';
$currentUser=new UserController($_SESSION['user']);
if($_GET['id']){
    try
    {
    $id_commande=$_GET['id'];

        $order=OrderController::getOrders($currentUser->ID,$id_commande);
// create an API client instance
        $client = new Pdfcrowd("ap_projet81", "d2ccea498fb538494d6e3305daae7f6e");
        $client->usePrintMedia(True);

// convert a web page and store the generated PDF into a $pdf variable
$html="<html><head><link rel=\"stylesheet\" type=\"text/css\" href='".URL."/public/bootstrap-3.3.7-dist/css/bootstrap.min.css' media=\"print\"> <style>table{width:100%;margin-bottom: 20px;}</style></head><body>";

$html.="<table><tr><td><p>Atout-Protect</p><p>2 rue de limayrac 31500 Toulouse</p></td><td>Facture N°".$id_commande."</td></tr></table>";

    $html.="<table<tr><td><p>N° commande : ".$id_commande."</p><p>".date('d/m/Y',strtotime($order->Date_achat))."</p><p>N° Client: ".$currentUser->ID."</p></td><td><p>".$currentUser->nickname." ".$currentUser->name."</p><p>".$currentUser->adresse."</p></td></tr></table>";

    $html.="<table class='table table-bordered table-striped'><tr><th>Quantité</th><th>Description</th><th>Prix</th></tr>";

    foreach($order->products as $product){
        $html.="<tr><td>1</td><td>".$product['Licence_libelle']."</td><td>".$product['Licence_Prix']."€</td></tr>";
    }
        $html.="<tr><td>Prix total :</td><td></td><td>".$order->Prix_total."€</td></tr>";



$html.="</table>";



$html.="</body></html>";
        $pdf = $client->convertHtml($html);

// set HTTP response headers
        header("Content-Type: application/pdf");
        header("Cache-Control: max-age=0");
        header("Accept-Ranges: none");
        header("Content-Disposition: attachment; filename=\"google_com.pdf\"");

// send the generated PDF
        echo $pdf;
    }
    catch(PdfcrowdException $why)
    {
        echo "Pdfcrowd Error: " . $why;
    }
}
else{
    echo "aucunes commande selectionnée";
}

?>