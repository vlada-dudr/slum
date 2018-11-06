<!doctype html>
<?php

require_once("Autoloader.php");

spl_autoload_register('Autoloader::ClassLoader');

$app = App::getInstance();
$db = $app->getConn();

$app->renderHeader();
$app->renderPosts();
$app->renderFooter();
