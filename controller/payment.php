<?php
/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 05/03/2017
 * Time: 13:10
 */
 $currentCart=new CartController($_SESSION['cart']);
 $totalPrix=$currentCart->totalPrice;
$user_API='adrien.carre_api1.limayrac.fr';
 $key_API='AFcWxV21C7fd0v3bYYYRCpSSRl31As.QNkS3LpZqnqGDmJxJv9cAlVHn';
 $pass_API='APRWJZ26NPWPG9BZ';
 $args_API=array(
    'METHOD'=>'SetExpressCheckout',
    'VERSION'=>'74.0',
     'USER'=>$user_API,
     'SIGNATURE'=>$key_API,
     'PWD'=>$pass_API,
     'RETURNURL'=>URL.'/paymentProcess',
     'CANCELURL'=>URL.'/paymentProcess',
     'PAYMENTREQUEST_0_AMT'=>$totalPrix,
     'PAYMENTREQUEST_0_CURRENCYCODE'=>'EUR'
 );

 foreach ($currentCart->products as $key=>$value){


     $args_API['L_PAYMENTREQUEST_0_NAME'.$key]=$value['nom'].": licence ".$value['type_licence'];
     $args_API['L_PAYMENTREQUEST_0_AMT'.$key]=$value['prix_total'];
 }

 $args_API=http_build_query($args_API);
$endpoint_sandbox='https://api-3t.sandbox.paypal.com/nvp';
$endpoint='https://api-3t.paypal.com/nvp';
$curl = curl_init();
curl_setopt_array($curl,array(
CURLOPT_URL=>$endpoint_sandbox,
    CURLOPT_POST=>1,
    CURLOPT_POSTFIELDS=>$args_API,
    CURLOPT_RETURNTRANSFER=>1,
    CURLOPT_SSL_VERIFYPEER=>false,
    CURLOPT_SSL_VERIFYHOST=>false,
    CURLOPT_VERBOSE=>1
));
$response=curl_exec($curl);
curl_close($curl);
$responseArray=array();
parse_str($response,$responseArray);

$html="<div class='col-lg-12 text-center'>";
if($responseArray['ACK'] =='Success'){



    $html.="<a class='btn btn-primary' style='margin-top:15px;font-size:20px;' href='https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&useraction=commit&token=".$responseArray['TOKEN']."'>PAYER AVEC PAYPAL</a>";

}
else{
    $html.="Une erreur est survenu , veuillez recharger la page...";
}
$html.="</div>";



require WEBROOT.'/public/view_payment.php';