<?php
/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 11/07/2017
 * Time: 17:28
 */?>

<div class="corp">
<div class="col-lg-12 text-center">
<div class="text-center" style="margin-top:20px;width:50%;margin-left: auto;margin-right: auto;">
    <h1>Connection :</h1>
    <form id="connectionform">
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" name="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="passw">mot de passe:</label>
            <input type="password" name="passw" class="form-control" id="passw">
        </div>
    </form>
    <button id="submitform" class="btn btn-primary">Se connecter</button>
</div>
</div>
</div>

<script>
    $('#submitform').click(function(){
        $.ajax({
            url : '../controller/ConnectionProcess.php',
            type : 'POST',
            data : $('#connectionform').serialize(),
            dataType : 'html',
            success : function(e){
                $('body').append(e);
            }
        });
    });
</script>