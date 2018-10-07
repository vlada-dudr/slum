<?php
require_once("classes/DB.class.php");
require_once("classes/User.class.php");

$user = new User();
echo $user->showUsers();
?>
	