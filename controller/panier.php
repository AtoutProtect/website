<?php

if (isset($_SESSION['user'])){
    require WEBROOT.'/public/view_panier.php';
}
else{
    header("Location: ".URL."/compte");
}







