<?php

class CartController
{

    private $products;
    private $validated=false;
    private $empty=true;
    private $count = 0;
    private $totalPrice=0;

    public function addToCart($product)
    {

    }

    public function ResetCart()
    {
        //vider $products
        //mettre empty a true
        //mettre 
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function isEmpty()
    {
        return $this->empty;
    }

    public function isValidated()
    {
        return $this->validated;
    }

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function setEmpty($empty)
    {
        $this->empty = $empty;
    }

    public function validate()
    {
        $this->validated = true;
    }

    public function toArray()
    {
        $array = array(
            'products'=>$this->getProducts(),
            'validated'=>$this->isValidated(),
            'empty'=>$this->isEmpty(),
            'count'=>$this->getCount(),
            'totalprice'=>$this->getTotalPrice()
        );

        return $array;
    }


}