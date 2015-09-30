<?php
    $fruit = "ananas";
    $vindA = "a";
    $fruitpos  = strrpos($fruit, $vindA);
    $upperFruit = strtoupper($fruit);
?>

<!DOCTYPE html>
<html>
	<body>
        <h1>Deel 2</h1>
        <?php echo $fruitpos ?><br>
        <?php echo $upperFruit ?>
	</body>
</html>