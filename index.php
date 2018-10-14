<?php
require_once("classes/DB.class.php");

$db = DB::getInstance();
$row = $db->getRow("SELECT * FROM users");
echo $row['username'];

?>
	
