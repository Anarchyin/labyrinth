<?php

//echo "<pre>"; print_r($resultFind); echo "</pre>";

if ( count($resultFind)>0 ){
    foreach ($resultFind as $news){
        ?>
        <p>
            <?
            echo " Дата публикации: {$news['Publication_Date']}, Заголовок: {$news['Announce']}";
            ?>
        </p>
        <?php
    }
}