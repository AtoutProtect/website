<?php 



?>
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
        <?php
        if (!isset($_SESSION['user'])){
         ?>
          <a href="/inscription">
              <button type="button" class="btn btn-primary btn-lg">S'inscrire</button>
          </a>
          <?php } ?>
      </div>
    </div>

    <div class="item">
  <?php echo  "<img src='".URL."/public/img/1.jpg'  />" ?>
     <div class="carousel-caption">
        <h1>Atout Protect</h1>
        <h4>Acceder a toutes nos solutions.</h4>

         <?php
         if (!isset($_SESSION['user'])){
             ?>
             <a href="/inscription">
                 <button type="button" class="btn btn-primary btn-lg">S'inscrire</button>
             </a>
         <?php } ?>

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
<div class="corp">
    <div class="row">
        
        <div class="container cards_home">
            <div class="col-lg-4">
                <div class="card_home">
                    <?php echo  "<img src='".URL."/public/img/vignette2.jpg'/>" ?>
                  <h2>Test</h2>
                  <p>TEst teongpe isengisgn eosgjeigj eih.</p>
                </div> 
            </div>

            <div class="col-lg-4">
                <div class="card_home">
                    <?php echo  "<img src='".URL."/public/img/vignette2.jpg'/>" ?>
                  <h2>Test</h2>
                  <p>TEst teongpe isengisgn eosgjeigj eih.</p>
                </div> 
            </div>

            <div class="col-lg-4">
                <div class="card_home">
                    <?php echo  "<img src='".URL."/public/img/vignette2.jpg'/>" ?>
                  <h2>Test</h2>
                  <p>TEst teongpe isengisgn eosgjeigj eih.</p>
                </div> 
            </div>

            
        </div>
    </div>

 

    

  
       
  
 
