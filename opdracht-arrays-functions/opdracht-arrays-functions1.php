<?php

	$dieren	= array("flamingo", "muis", "olifant", "korkodil", "tijger", "hond");
	$aantal	= count($dieren);
	$teZoekenDier =	"hond";
	$gevonden =	array_search($teZoekenDier, $dieren);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>arrays-functions</title>
</head>
<body>
   <h1>Deel 1</h1>
    <p>aantal dieren: <?php echo $aantal ?></p>
    <?php if ( $gevonden ): ?>
    <p><?php echo $teZoekenDier ?> is gevonden</p>
    <?php else: ?>
    <p><?php echo $teZoekenDier ?> is niet gevonden</p>
    <?php endif ?>
</body>
</html>
