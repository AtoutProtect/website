<?php  ?>
<div class="container">
    <div class="row">
       
                


                <div class="col-lg-12">
                    <div class="bloc_produits">
                        <h1>Produits Disponibles :</h1>
                        <div class="col-lg-6">
                            <table>

                            <tr>
                                <td class=""> <?php echo  "<img src='".URL."/public/img/soft1.jpg'  />" ?></td>
                                 <td class=""><h2>Produit 1</h2></td>
                                  <td class=""> 
                                      <select class="form-control" id="sel1">
                                                        <option value="" selected disabled>Selecionnez licence...</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                    </select>
                                    </td>

                                   <td class="">
                                        <a href="" class="btn btn-primary button_add">Ajouter</a>
                                   </td>
                            </tr>
                            </table>
                        </div>

                        <div class="col-lg-6">
                            <table>

                            <tr>
                                <td class=""> <?php echo  "<img src='".URL."/public/img/soft1.jpg'  />" ?></td>
                                 <td class=""><h2>Produit 1</h2></td>
                                  <td class=""> 
                                      <select class="form-control" id="sel1">
                                                        <option value="" selected disabled>Please select</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                    </select>
                                    </td>

                                   <td class="">
                                        <a href="" class="btn btn-primary button_add">Ajouter</a>
                                   </td>
                            </tr>
                            </table>
                        </div>
                       

                   

                </div>
            </div>
    
</div>
<div class="corp col-lg-12" xmlns="http://www.w3.org/1999/html">


    <script>
        $('div.bloc_produits > ul > li').hover(function () {

            if ($(this).children("a").children("div.desc").hasClass("clear")) {
                $(this).children("a").children("div.desc").removeClass("clear");
                $(this).children("a").children("div.desc").addClass("unclear");
                $(this).children("a").children("div.desctxt").removeClass("white");
                $(this).children("a").children("div.desctxt").addClass("black");


            } else {
                $(this).children("a").children("div.desc").removeClass("unclear");
                $(this).children("a").children("div.desc").addClass("clear");
                $(this).children("a").children("div.desctxt").removeClass("black");
                $(this).children("a").children("div.desctxt").addClass("white");

            }

        });
    </script>

</div>
</div>
<script>
    $(document).ready(function(){
        $('.btn_add').click(function(){
            var product_id=$(this).attr("product_id");
            var selected_licence = $('#tr'+product_id).('#sel1').find(":selected").text();
            $.ajax({
                url:'AddToCart.php',
                type:'POST',
                data:'product_id='+product_id+'&licence_id='selected_licence

            })
        });

    });
</script>