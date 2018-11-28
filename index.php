<?php

require_once("Autoloader.php");

spl_autoload_register('Autoloader::ClassLoader');

$app = App::getInstance();
$db = $app->getConn();

$view = new view\$value();


$app->run();
//$app->renderPosts();


echo "<div class='posts'></div>";
echo "<button class='posts__button'>HEck</button>";

$app->renderFooter();
