<div class="corp">

<?php



/* Mettre dans l'index pour recup une seule fois l'user a la connect sur le site*/
if(isset($_SESSION['user']) && $_SESSION['user']!=null){
$userController=new UserController();
$userController=unserialize($_SESSION['user']);
    echo $userController->getadresse();
    echo $userController->getName();
    echo $userController->getNickname();
}

 ?>

   <div class="row mb50"> 
       <div class="col-lg-8">
           <h1 id="panier">Mon Panier </h1><button type="button" class="btn btn-success">Finaliser mes achats</button>
        </div>
   </div>
   <div class="row">
       <div class="col-lg-8">
    <div class="bloc_panier">
<table class="table table-striped table_panier">

    <tr>
        <td>Date : </td>
        <td id="nom_produit">Produit :</td>
        <td>Quantité : </td>
        <td>Prix : </td>
        <td></td>

    </tr>
    <tr>
        <td>10/12/2016</td>
        <td id="nom_produit">Software n1 :</td>
        <td>1</td>
        <td id="prix_produit">49e  </td>
        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
    </tr>
    <tr>
        <td>10/12/2016</td>
        <td id="nom_produit">Software n1 :</td>
        <td>1</td>
        <td id="prix_produit">49e </td>
        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
    </tr>
    <tr>
        <td>10/12/2016</td>
        <td id="nom_produit">Software n1 :</td>
        <td>1</td>
        <td id="prix_produit">49e  </td>
        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
    </tr>
    <tr>
        <td>10/12/2016</td>
        <td id="nom_produit">Software n1 :</td>
        <td>1</td>
        <td id="prix_produit">49e </td>
        <td><button type="button" class="btn btn-danger">Supprimer</button></td>

    </tr>
    <tr>
        <td>10/12/2016</td>
        <td id="nom_produit">Software n1 :</td>
        <td>1</td>
        <td id="prix_produit">49e </td>
       <td><button type="button" class="btn btn-danger">Supprimer</button></td>
    </tr>

</table>
</div>
</div>
<div class="col-lg-4">
    <div class="menu_profil">

        <ul class="ul_menu_profil">

            <li>
                <a href="">Mon panier</a>
            </li>
            <li>
                <a href="">Mes coordonnées</a>
            </li>
            <li>
                <a href="">Mes moyens de paiements</a>
            </li>
            <li>
                <a href="">Mes commandes</a>
            </li>
            <li>
                <a href="">Deconnection</a>
            </li>

        </ul>
    </div>
</div>
</div>