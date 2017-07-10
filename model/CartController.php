<?php

class CartController
{

    private $products;
    private $validated=false;
    private $empty=true;
    private $count = 0;
    private $totalPrice=0;


     function __construct($args=null){

     if ($args !=null){
         foreach($args as $key => $val) {
                 $this->{$key} = $val;
         }
         $this->isNull=false;
         $this->set();
     }

    }

    public function set()
    {
        $_SESSION['cart']=null;
        $_SESSION['cart']=serialize($this);
    }


    public function addToCart($product)
    {
        $this->products[]=$product;
        $this->set();
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