<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 05/03/2017
 * Time: 01:36
 */
class OrderController
{
    public $Achat_ID;
    public $User_ID;
    public $products=array();
    public $date;
    public $Prix_total;


    function __construct($args=null){

        if ($args !=null){
            foreach($args as $key => $val) {
                $this->{$key} = $val;
            }

        }

    }

    public static function getOrders($user_ID) {

        $db = new database();
        $orders=array();


        $ordersrequest=$db->rowSelect(array("User_ID"=>$user_ID),array("achat"),10);

        foreach ($ordersrequest as $key=>$value){
            $order=new OrderController($value);


            $licences=$db->rowSelect(array("achat_ID"=>$value['Achat_ID']),array("licence"),10);

            foreach($licences as $k=>$v){
                // $licence = new LicenceController($value);
                array_push($order->products,$v);
            }

            array_push($orders,$order);

        }


        return $orders;
    }

    public function insertOrder($user)
    {

       // put($user,"commande");
    }


}