<?php

	$get = array(8, 7, 8, 7, 3, 2, 1, 2, 4);
    $dupli = array_unique($get);
    $sort = $dupli;
    rsort($sort);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>arrays-functions</title>
</head>
<body>
   <h1>Deel 3</h1>
    <p>zonder duplicaten: <?php var_dump($dupli) ?> </p>
    <p>gesorteerd: <?php var_dump($sort) ?></p>
</body>
</html>
