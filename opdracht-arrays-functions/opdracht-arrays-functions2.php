<?php

	$dieren	= array("flamingo", "muis", "olifant", "korkodil", "tijger", "hond");
    sort($dieren);
    $zoogdieren = array("mens", "bonobo", "dolfijn");
    $dierenLijst = array_merge($dieren, $zoogdieren);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>arrays-functions</title>
</head>
<body>
   <h1>Deel 2</h1>
    <p>gesorteerd: <?php var_dump($dieren) ?> </p>
    <p>dierenlijst: <?php var_dump($dierenLijst) ?></p>
</body>
</html>
