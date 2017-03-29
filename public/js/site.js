/**
 * Created by adrie on 05/03/2017.
 */

 function isConnected(){

    //requete ajax qui renvoie le resultat de isset(userController)
    //si true : appel RedirectCart
    //si false : html.append()
    
 }


 function RedirectCart(){

     window.location.href ="/panier";

 }

 function addToCart(product)
 {
     //requete ajax vers UpdateCart()
 }

 function Connection()
 {

     $.ajax({

         url : '../../controller/ConnectionProcess.php',
         type : 'POST',
         data : $(".form_connection").serialize(),
         success : function(datas){
           $(".corp").append(datas);
         },
         error : function(resultat, statut, erreur){

            alert('erreur');

         },


         complete : function(resultat, statut){

            alert('complet');
         }

     });
 }
