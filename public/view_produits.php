<?php  ?>

<div class="corp col-lg-12" xmlns="http://www.w3.org/1999/html">
<div class="col-lg-4">
    <div class="tri_liste">

        <h1>Trier par :</h1>

        <div class="list-group">

            <label class="list-group-item list-group-item-action"><input type="checkbox"> Prix croissant</label>
            <label class="list-group-item list-group-item-action"><input type="checkbox"> année</label>
            <label class="list-group-item list-group-item-action"><input type="checkbox"> date de sortie</label>
            <label class="list-group-item list-group-item-action"><input type="checkbox"> Promotions</label>

        </div>



    </div>
</div>


<div class="col-lg-8">
    <div class="bloc_produits">
<h1>Produits Disponibles :</h1>
<ul>
    <li><p>Produit 1</p><p>Description azifzoebguzeobgeokfbiosg</p>
    </li>
    <li><p>Produit 1</p><p>Description azifzoebguzeobgeokfbiosg</p>
    </li>
    <li><p>Produit 1</p><p>Description azifzoebguzeobgeokfbiosg</p>
    </li>
    <li><p>Produit 1</p><p>Description azifzoebguzeobgeokfbiosg</p>
    </li>
</ul>
        <!--<ul>

            <li>
                <a href="/produit/"><div class="desc clear">
                </div>
                <div class="desctxt white">Soft 2016</div>

                <div class="prix">54€</div>
                </a>
            </li>
            <li>
                <a href="/produit/"><div class="desc clear">
                    </div>
                    <div class="desctxt white">Soft 2016</div>

                    <div class="prix">54€</div>
                </a>
            </li>
            <li>
                <a href="/produit/"><div class="desc clear">
                    </div>
                    <div class="desctxt white">Soft 2016</div>

                    <div class="prix">54€</div>
                </a>
            </li>
            <li>
                <a href="/produit/"><div class="desc clear">
                    </div>
                    <div class="desctxt white">Soft 2016</div>

                    <div class="prix">54€</div>
                </a>
            </li>
            <li>
                <a href="/produit/"><div class="desc clear">
                    </div>
                    <div class="desctxt white">Soft 2016</div>

                    <div class="prix">54€</div>
                </a>
            </li>
            <li>
                <a href="/produit/"><div class="desc clear">
                    </div>
                    <div class="desctxt white">Soft 2016</div>

                    <div class="prix">54€</div>
                </a>
            </li>
            <li>
                <a href="/produit/"><div class="desc clear">
                    </div>
                    <div class="desctxt white">Soft 2016</div>

                    <div class="prix">54€</div>
                </a>
            </li>
            <li>
                <a href="/produit/"><div class="desc clear">
                    </div>
                    <div class="desctxt white">Soft 2016</div>

                    <div class="prix">54€</div>
                </a>
            </li>

        </ul> -->

    </div>

    <script>


        $('div.bloc_produits > ul > li').hover(function(){

            if($(this).children("a").children("div.desc").hasClass("clear")){
                $(this).children("a").children("div.desc").removeClass("clear");
                $(this).children("a").children("div.desc").addClass("unclear");
                $(this).children("a").children("div.desctxt").removeClass("white");
                $(this).children("a").children("div.desctxt").addClass("black");


            }
            else{
                $(this).children("a").children("div.desc").removeClass("unclear");
                $(this).children("a").children("div.desc").addClass("clear");
                $(this).children("a").children("div.desctxt").removeClass("black");
                $(this).children("a").children("div.desctxt").addClass("white");

            }

        });

    </script>

</div>
</div>