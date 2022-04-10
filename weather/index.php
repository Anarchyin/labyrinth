<?php   require_once($_SERVER["DOCUMENT_ROOT"]."/local/templates/header.php"); ?>

    <?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/local/classes/init.php");


    $var = new init();
    $html = $var->get_html();


    ?>
<a href="#" class="update" >Обновить</a>
<div class="weather">

    <?
    echo $html;
    ?>

</div>


<?php   require_once($_SERVER["DOCUMENT_ROOT"]."/local/templates/footer.php"); ?>

