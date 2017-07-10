<?php
session_start();
if(isset($_POST['produit']) && isset($_POST['licence']) && isset($_POST['quantite'])){

    $produit = $_POST['produit'];
    $licence = $_POST['licence'];
    $quantite = $_POST['licence'];
    $cart = new cart();
    $cart = $_SESSION['cart'];
    $cart->addToCart($produit);
}