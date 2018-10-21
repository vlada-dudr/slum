<?php

require_once("Autoloader.php");

spl_autoload_register('Autoloader::ClassLoader');


$db = DB::getInstance();


//Testing the database
$stmt = $db->query("SELECT * FROM users LIMIT 2");
while($row = $stmt->fetch()) {
	echo $row["username"];
}

$app = App::getInstance();
?>

<!doctype html>
<html>
	<head>
		<title>+Slum-</title>
		<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>

	</head>

	<body>
		<form method="POST" action="register.php">

		</form>
	</body>
</hmtl>
