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

</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container text-center">
            <div class="test">
                <ul class="nav navbar-nav">
                    <li><a href="">Accueil</a></li>
                
                
                     <li><a href="">Produits</a></li>
    <li><a href="">Promotions</a></li>
                </ul>

                <ul class="nav navbar-nav text-center">
                    <li>
                        <?php echo  "<img src='".URL."/public/img/logo.png'/>" ?>
                    </li>
                </ul>
                <ul class="nav navbar-nav text-right">
                    <li><a href="">Mon compte</a></li>
                    <li><a href="">A propos</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">
       
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
     <!-- <div class="carousel_item"></div>-->
  <?php echo  "<img src='".URL."/public/img/cloud-software-solutions.jpg'  />" ?>
      <div class="carousel-caption">
        <h1>Atout Protect</h1>
        <h4>Gerer vos solutions en un click.</h4>
        <button type="button" class="btn btn-primary btn-lg">S'inscrire</button>
      </div>
    </div>

    <div class="item">
  <?php echo  "<img src='".URL."/public/img/1.jpg'  />" ?>
     <div class="carousel-caption">
        <h1>Atout Protect</h1>
        <h4>Acceder a toutes nos solutions.</h4>
                <button type="button" class="btn btn-primary btn-lg">S'inscrire</button>

      </div>
    </div>

    
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>