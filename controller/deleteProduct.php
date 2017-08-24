<?php
require "../webdefinition.php";
if(isset($_POST['product_id'])){
    $produit = $_POST['product_id'];
    $cart = new CartController($_SESSION['cart']);
    $cart->deleteProduct($produit);
    echo $cart->count;

}
else{
    echo "PAS OK";
}