


<div class="row text-center">

    <div class="col-lg-12 text-center">
    <a href="/panier" class="btn btn-primary btn-responsive"  style="margin-top:20px;">< Retour au panier</a>
        <table class="table table-striped table_panier" style="margin-top:20px;width:60%;margin-left:auto;margin-right:auto;">
            <tr>
                <td id="nom_produit">Produit :</td>
                <td>Quantité : </td>
                <td>Type licence :</td>
                <td>Prix : </td>


            </tr>
            <?php

            $panier = new CartController($_SESSION['cart']);
            foreach($panier->products as $product){

                ?>
                <tr>
                    <td id="nom_produit"><?php echo $product['nom'] ?> :</td>
                    <td>1</td>
                    <td><?php echo $product['type_licence'] ?></td>
                    <td id="prix_produit"><?php echo $product['prix_total'] ?> € </td>
                </tr>
            <?php } ?>

<tr><td colspan="3"><strong>Prix total :</strong></td><td><strong style="color: red;"><?php echo $panier->totalPrice; ?>€</strong></td></tr>
        </table>

    </div>

</div>

<?php


echo $html;

