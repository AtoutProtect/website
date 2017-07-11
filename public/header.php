<?php

$_SESSION["connected"]=0;

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>AtoutProtect</title>


    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link rel="stylesheet" href="public/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script type="text/javascript" src="public/js/jquery-3.1.1.min.js"></script>
    <script src="public/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="public/js/site.js"></script>
    <script src="public/js/bootstrap-editable.min.js"></script>
    <link rel="stylesheet" href="public/css/bootstrap-editable.css">


</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container text-center">
            <div class="test">
                <ul class="nav navbar-nav">
                    <li><a href="/home">Accueil</a></li>


                    <li><a href="/produits">Produits</a></li>
                    <li><a href="/promo">Promotions</a></li>
                </ul>

                <ul class="nav navbar-nav text-center">
                    <li>
                        <?php echo  "<img src='".URL."/public/img/logo.png'/>" ?>
                    </li>
                </ul>
                <ul class="nav navbar-nav text-right">
                    <li><a href="/compte">Mon compte</a></li>
                    <li><a href="/propos">A propos</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>