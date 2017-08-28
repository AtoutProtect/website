<?php ?>

</div>
<div class="footer">
    <div class="footer_content">

        <a href="/propos">A propos</a>
        <a href="mailto: contact@atout-protect.com">Nous contacter</a>
        <a href="/conditions">Conditions d'utilisation</a>

    </div>

</div>
<script>
    function AdaptativeContentHeight(){
        if($("body").height() < $(window).height())
            $(".footer").css({
                "position": "absolute",
                "bottom": "0",
                "width": "100%"
            });
        else
            $(".footer").css({
                "position": "static"

            });
    }
    $(document).ready(function(){
        AdaptativeContentHeight();
    });
</script>
</body>
</html>