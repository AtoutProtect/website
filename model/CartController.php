<?php

class CartController
{

    public $products=array();
    public $validated=false;
    public $empty=true;
    public $count = 0;
    public $totalPrice=0;


     function __construct($args=null){

     if ($args !=null){
         foreach($args as $key => $val) {
                 $this->{$key} = $val;
         }
         $this->set();
     }

    }

    public function set()
    {
        unset($_SESSION['cart']);
        $_SESSION['cart']=(array)$this;
    }


    public function addToCart($productid)
    {
    $db = new database();

   $typeLicence= new TypeLicenceController($_SESSION['TypeLicence']);
    $product=$db->rowSelect(array("ID"=>$productid),array("logiciel_atout_sa"),1);
    array_push($this->products,array(
    "ID"=>$product['ID'],
    "base_prix"=>$product['Prix'],
    "nom"=>$product['Nom'],
    "type_licence"=>$typeLicence->Nom_type_licence,
    "ID_type_licence"=>$typeLicence->Type_ID,
    "prix_total"=>$typeLicence->Coeficient_prix*$product['Prix']
    ));

    var_dump($typeLicence->Coeficient_prix*$product['Prix']);
$this->count++;
$this->totalPrice=$this->totalPrice+$typeLicence->Coeficient_prix*$product['Prix'];
/*var_dump($this->totalPrice);
        var_dump($typeLicence);
        var_dump($typeLicence->Coeficient_prix);
        var_dump($product['Prix']);*/
        $this->set();
    }

    public function deleteProduct($productid)
    {
   // print_r($this->products);
   // print_r("<br>");
       foreach ($this->products as $key=>$value){
           if($value['ID'] == $productid){
               unset($this->products[$key]);
               $this->totalPrice=$this->totalPrice-$value['prix_total'];
           }
       }
       if($this->count > 0){
           $this->count--;
       }


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