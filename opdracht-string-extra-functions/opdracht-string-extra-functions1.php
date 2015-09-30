<?php
    $fruit = "kokosnoot";
    $fruitchar = strlen($fruit);
    $vindO = "o";
    $fruitpos  = strpos($fruit, $vindO);
?>

<!DOCTYPE html>
<html>
	<body>
        <h1>Deel 1</h1>
        <?php echo $fruitchar ?><br>
        <?php echo $fruitpos ?>
	</body>
</html>