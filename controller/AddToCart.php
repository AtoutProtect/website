<?php
require "../webdefinition.php";
if(isset($_POST['product_id']) && isset($_POST['licence_id'])){
    $produit = $_POST['product_id'];
    $licence = $_POST['licence_id'];
    $SelectedLicence=TypeLicenceController::getLicence($licence);

    $TypeLicence = new TypeLicenceController($SelectedLicence);

    $cart = new CartController($_SESSION['cart']);

    $cart->addToCart($produit);
    echo "<script>alert('produit ajouté a votre panier');window.location.reload();</script>";

}
else{
    echo "<script>alert('une erreur est survenu , veuillez reessayer...');</script>";
}