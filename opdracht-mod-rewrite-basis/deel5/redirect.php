<?php
	$role = "";
	$user = "";

	if (isset($_GET["user"])) {
		$user = $_GET["user"];
	}
	if (isset($_GET["role"])) {
		$role = $_GET["role"];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Redirect</title>
</head>
<body>
	<h1>Redirect bestand</h1>

	<?= $user ?>
	<?= $role ?>
</body>
</html>