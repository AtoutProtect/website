
<?php
echo"information de votre compte<br>";
echo"Cliquer sur une information pour la mettre à jour.<br>";
echo $informationsForm;
?>
<div class="corp">
<form method="post" action="<?php echo URL; ?>">
<button name="deconnection" value="1" href="#" type="submit" class="btn btn-primary">Se déconnecter</button>
</form>
</div>
<script>
    $(document).ready(function() {
        $('#name').editable();
        $('#nickname').editable();
        $('#email').editable();
        $('#adresse').editable();
    });
</script>