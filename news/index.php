<?php   require_once($_SERVER["DOCUMENT_ROOT"]."/local/templates/header.php"); ?>

<?php
require_once ($_SERVER["DOCUMENT_ROOT"]."/news/NewsController.php");

$news = new News();

?>

    <form method="post">
        <span>добавить новость</span>
        <br>
        <span>Заголовок</span>
        <br>
        <input name="Header">
        <br>
        <span>Анонс</span>
        <br>
        <input name="Announce">
        <br>
        <span>Текст новости</span>
        <br>
        <input name="Main_Text">
        <br>
        <span>Теги</span>
        <br>
        <input name="Tags">
        <br><br>
        <input type="hidden" name="action" value="addNews">
        <button type="submit">Создать</button>
    </form>

    <br><br>

    <form method="get">
        <span>Найти новость id или заголовку</span><br>
        <span>Название</span><br>
        <input name="q"><br>
        <span>ID</span><br>
        <input name="id"><br>
        <input type="hidden" name="action" value="find">
        <button type="submit">Найти</button>

    </form>

    <br><br>

    <form method="get">
        <span>Удалить новость по id</span><br>
        <span>ID</span><br>
        <input name="id"><br>
        <input type="hidden" name="action" value="delete">
        <button type="submit">Удалить</button>

    </form>


<?php

$obj = new NewsController();

?>


<?php   require_once($_SERVER["DOCUMENT_ROOT"]."/local/templates/footer.php"); ?>