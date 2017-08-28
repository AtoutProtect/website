<?php  ?>
<div class="container">
    <div class="row">




                <div class="col-lg-12">
                    <div class="bloc_produits">
                        <h1>Produits Disponibles :</h1>
                        <?php echo $html; ?>


                </div>
            </div>
    
</div>
<div class="corp col-lg-12" xmlns="http://www.w3.org/1999/html">


    <script>
        function addtocart(element){
            var product_id=$(element).attr('id');
            var selectId="#sel"+product_id;
            var selected_licence = $(selectId).find(":selected").val();

            $.ajax({
                url:'../controller/AddToCart.php',
                type:'POST',
                data:'product_id='+product_id+'&licence_id='+selected_licence,
                dataType:'html',
                success : function(e){
                    
                    $('.badge').empty();
                    $('.badge').css('display','initial');
                    $('.badge').append(e);
                }

            });



        }
    function test(){
        alert('test');
    }
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
