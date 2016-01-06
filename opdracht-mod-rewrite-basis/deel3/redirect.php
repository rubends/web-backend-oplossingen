<?php
	$user = "";

	if (isset($_GET["user"])) {
		$user = $_GET["user"];
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
</body>
</html>