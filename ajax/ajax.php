<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/local/classes/init.php");

$var = new init();
$html = $var->get_html();
echo $html;

?>