<?php

/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 05/03/2017
 * Time: 01:36
 */
class OrderController
{
    public $id;
    public $user;
    public $products;
    public $total_price;

    public function saveOrder(){
        
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setProducts($products)
    {
        $this->products = $products;
    }

    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function insertOrder($user)
    {
        $user = serialize($order);
        put($user,"commande");
    }


}