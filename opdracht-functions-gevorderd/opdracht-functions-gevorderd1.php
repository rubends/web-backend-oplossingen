<?php

	$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";

    function way1($needle)
	{
		$md5 = $GLOBALS['md5HashKey'];
		$count =  strlen($md5);
		$ndlcount = substr_count ($md5, $needle);
		$ndlproc = ($ndlcount/$count) * 100;
		return $ndlproc;
	}

	function way2($md5, $needle)
	{
		$count =  strlen($md5);
		$ndlcount = substr_count($md5, $needle);
		$ndlproc = ($ndlcount/$count) * 100;
		return $ndlproc;
	}

	function way3($needle)
	{
		global $md5HashKey;
		$md5 = $md5HashKey;
		$count = strlen($md5);
		$ndlcount = substr_count($md5, $needle);
		$ndlproc = ($ndlcount/$count) * 100;
		return $ndlproc;
	}

	$een = way1("2");
	$twee =	way2($md5HashKey, "8" );
	$drie =	way3("a");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>functions voor gevorderden</title>
</head>
<body>
    <h1>deel 1</h1>
    <p> 2 komt <?php echo $een ?>% voor in <?php echo $md5HashKey ?></p>
    <p> 8 komt <?php echo $twee ?>% voor in <?php echo $md5HashKey ?></p>
    <p> a komt <?php echo $drie ?>% voor in <?php echo $md5HashKey ?></p>
</body>
</html>