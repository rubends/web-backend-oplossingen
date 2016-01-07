<?php
	$controller = "";
	$method = "";
	$id = "";

	function __autoload($className)
	{

		include_once 'classes/' . $className . '.php';
	}

	if (isset($_GET["controller"])) {
		$controller = $_GET["controller"];
	}
	if (isset($_GET["id"])) {
		$id = $_GET["id"];
	}
	if (isset($_GET["method"])) {
		$method = $_GET["method"];
		$bieren = new Bieren();
		$bieren->$method();
	}

	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SPOE</title>
</head>
<body>
	<h1>Index</h1>
	<?= $controller ?>
	<?= $method ?>
	<?= $id ?>
</body>
</html>