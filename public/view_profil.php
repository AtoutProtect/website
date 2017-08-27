



<div class="col-lg-6">
    <h1>Informations sur votre compte : </h1>
    <p>Cliquer sur une information pour la mettre à jour.</p>
    <?php echo $informationsForm;?>

    <form method="post" action="<?php echo URL; ?>">
    <button name="deconnection" value="1" href="#" type="submit" class="btn btn-primary">Se déconnecter</button>
    </form>
</div>
<div class="col-lg-6">
    <h1>Mes commandes:</h1>
    <div class="licences">
        <?php echo $html; ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#name').editable();
        $('#nickname').editable();
        $('#email').editable();
        $('#adresse').editable();
    });
</script>

<?php
if(isset($_SESSION['cart'])){
 
}
