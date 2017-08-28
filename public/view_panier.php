<div class="corp">




   <div class="row mb50">
       <div class="col-lg-12 text-center">
           <h1 id="panier">Mon Panier </h1><a href="/payment" class="btn btn-success">Finaliser mes achats</a>
        </div>
   </div>
   <div class="row text-center">
       <div class="col-lg-12 text-center">

<table class="table table-striped table_panier" style="width:60%;margin-left:auto;margin-right:auto;">

    <tr>

        <td id="nom_produit">Produit :</td>
        <td>Quantité : </td>
        <td>Type licence :</td>
        <td>Prix : </td>
        <td></td>

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
        <td><button onclick="deleteProduct(this);" id="<?php echo $product['ID'] ?>" class="btn btn-danger">Supprimer</button></td>
    </tr>
    <?php } ?>


</table>

</div>

</div>
<script>
function deleteProduct(element){

    var product_id=$(element).attr('id');


    $.ajax({
        url:'../controller/deleteProduct.php',
        type:'POST',
        data:'product_id='+product_id,
        dataType:'html',
        success : function(e){

            $('.badge').empty();
            $('.badge').append(e);
            location.reload();
        }

    });



}
</script>