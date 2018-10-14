<?php

require_once("Autoloader.php");

spl_autoload_register('Autoloader::ClassLoader');

/*
require_once("classes/DB.class.php");
require_once("classes/App.class.php");
*/



/*
$db = DB::getInstance();
$row = $db->getRow("SELECT * FROM users");
echo $row['username'];
*/

$app = App::getInstance();
	
