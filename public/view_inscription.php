<?php

 ?>
 <div class="corp">
 <br><br><br>
     <div class="container">
         <form id="inscriptionform">
             <div class="form-group row">
                 <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                 <div class="col-sm-10">
                     <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                 </div>
             </div>
             <div class="form-group row">
                 <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                 <div class="col-sm-10">
                     <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prenom">
                 </div>
             </div>
             <div class="form-group row">
                 <label for="email" class="col-sm-2 col-form-label">Email</label>
                 <div class="col-sm-10">
                     <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                 </div>
             </div>
             <div class="form-group row">
                 <label for="passw" class="col-sm-2 col-form-label">Password</label>
                 <div class="col-sm-10">
                     <input type="password" class="form-control" name="passw" id="passw" placeholder="Password">
                 </div>
             </div>

         </form>
         <div class="form-group row">
             <div class="offset-sm-2 col-sm-10">
                 <button id="submitform" class="btn btn-primary">Finaliser l'inscription</button>
             </div>
         </div>
     </div>
 <br><br><br><br><br><br><br>



     <div class='modal fade'>
         <div class='modal-dialog' role='document'>
             <div class='modal-content'>
                 <div class='modal-header'>
                     <h5 class='modal-title'>Inscription terminé</h5>
                     <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                         <span aria-hidden='true'>&times;</span>
                     </button>
                 </div>
                 <div class='modal-body'>
                     <p class="messageresult"></p>
                 </div>
                 <div class='modal-footer'>

                     <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>
                 </div>
             </div>
         </div>
     </div>



 </div>
 <script>
 $('#submitform').click(function(){
     $.ajax({
         url : '../controller/inscriptionForm.php',
         type : 'POST',
         data : $('#inscriptionform').serialize(),
         dataType : 'html',
         success : function(e){
             $('body').append(e);
         }
     });
 });
 </script>