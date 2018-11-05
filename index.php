<!doctype html>
<?php

require_once("Autoloader.php");

spl_autoload_register('Autoloader::ClassLoader');



$app = App::getInstance();
$db = $app->getConn();
?>

<html>
	<head>
		<title>+Slum-</title>

	</head>

	<body>
		<?php
			//Testing the database
			$stmt = $db->query("SELECT * FROM text LIMIT 2");
			while($row = $stmt->fetch()) {
                echo "<p>\n" . $db->query("SELECT username FROM users WHERE id =" . $row["author"])->fetch()["username"] . "\n<br>\n";
                echo "<p>\n" . $row["title"] . "\n<br>\n";
                echo "<p>\n" . nl2br($row["body"]) . "\n<br>\n";
                echo "<p>\n" . $row["post_date"] . "\n<br>\n";
			}
			echo "</p>\n";

		?>
		<form method="POST" action="register.php">

		</form>
	</body>
</html>
