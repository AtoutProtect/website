<?php
/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 05/03/2017
 * Time: 13:10
 */
$currentUser=new UserController($_SESSION['user']);
$currentCart=new CartController($_SESSION['cart']);
$totalPrix=$currentCart->totalPrice;
$user_API='adrien.carre_api1.limayrac.fr';
$key_API='AFcWxV21C7fd0v3bYYYRCpSSRl31As.QNkS3LpZqnqGDmJxJv9cAlVHn';
$pass_API='APRWJZ26NPWPG9BZ';
$args_API=array(
    'METHOD'=>'GetExpressCheckoutDetails',
    'VERSION'=>'74.0',
    'USER'=>$user_API,
    'SIGNATURE'=>$key_API,
    'PWD'=>$pass_API,
   'TOKEN'=>$_GET['token']
);

foreach ($currentCart->products as $key=>$value){

    $args_API['L_PAYMENTREQUEST_0_NAME'.$key]=$value['nom'].": licence ".$value['type_licence'];
    $args_API['L_PAYMENTREQUEST_0_AMT'.$key]=$value['prix_total'];
    $args_API['L_PAYMENTREQUEST_0_TypeID'.$key]=$value['ID_type_licence'];
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

if ($responseArray['CHECKOUTSTATUS'] =="PaymentActionCompleted"){
    die("Ce paiement a déja été validé.");
}
if($responseArray['ACK'] =='Success'){
    $args_API=array(
        'METHOD'=>'DoExpressCheckoutPayment',
        'VERSION'=>'74.0',
        'USER'=>$user_API,
        'SIGNATURE'=>$key_API,
        'PWD'=>$pass_API,
        'TOKEN'=>$responseArray['TOKEN'],
        'PAYERID'=>$responseArray['PAYERID'],
        'PAYMENTREQUEST_0_AMT'=>$responseArray['AMT'],
        'PAYMENTREQUEST_0_CURRENCYCODE'=>'EUR',

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

    /*DANS UN FOREACH* : */

    foreach ($currentCart->products as $key=>$value){
        $generated_key=LicenceGenerator::generate_key_string();

        $key_args=array(
            "Licence_Type"=>$value['ID_type_licence'],
            "Licence_Serial"=>$generated_key,
            "Licence_Prix"=>$value['prix_total'],
            "Licence_Logiciel"=>$value['ID'],
        );


        $db=new database();
        $sql="insert into licence values (0,:Licence_Type,:Licence_Serial,:Licence_Prix,:Licence_Logiciel);";

        $db->rowInsert($sql,$key_args);
        $sql="insert into achat values (0,:User_ID,:Prix_total)";
        $achat_args=array(
        "User_ID"=>$currentUser->ID,
            "Prix_total"=>$currentCart->totalPrice
        );
        $achat_ID = $db->rowInsert($sql,$achat_args);
        var_dump($achat_ID);
        $sql="insert into achat_item values (0,:ID_achat,:ID_logiciel,:ID_Type_Licence,:prix_item)";
        $achat_item_args=array(
            "ID_achat"=>$achat_ID,
            "ID_logiciel"=>$value['ID'],
            "ID_Type_Licence"=>$value['ID_Type_Licence'],
            "prix_item"=>$value['$prix_total']
        );
        var_dump($achat_item_args);
        $achat_item_ID = $db->rowInsert($sql,$achat_item_args);
echo "Votre paiement a bien été validé , vous trouverez votre licence dans votre espace compte , rubrique 'mes licences' ";


//remplir table achat et achat_item
    }

}
else{
    echo 'ERREUR';
}



require WEBROOT.'/public/view_payment.php';