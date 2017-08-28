


<div style="min-height: 1000px;">
    <div class="col-lg-6">
        <h1>Informations sur votre compte : </h1>
        <p>Cliquer sur une information pour la mettre à jour.</p>
        <?php echo $informationsForm;?>


    </div>
    <div class="col-lg-6">
        <h1>Mes commandes:</h1>
        <div class="licences">
            <?php echo $html; ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#name').editable();
        $('#nickname').editable();
        $('#email').editable();
        $('#adresse').editable();
    });

    function showOrderPdf(id){
        var id_commande=id;
        $.ajax({
            url:'../controller/pdf.php',
            type:'POST',
            data:'id_commande='+id_commande,
            dataType:'html',
            error : function(e){

               alert('Une erreur est survenu , veuillez reessayer...');
            }

        });

    }
</script>



<?php
if(isset($_SESSION['cart'])){
 
}
