<?php
    $gegeven = "221108521";

    $seconden = $gegeven;
    $minuten = floor($gegeven/60);
    $uren = floor($minuten/60);
    $dagen = floor($uren/24);
    $weken = floor($dagen/7);
    $maanden = floor($dagen/31);
    $jaren = floor($maanden/12);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>if else</title>
	</head>
	<body>
		<h1>Deel 2</h1>
       <p>aantal seconden: <?php echo $seconden ?></p>
        <ul>
           
            <li>minuten: <?php echo $minuten ?></li>
            <li>uren: <?php echo $uren ?></li>
            <li>dagen: <?php echo $dagen ?></li>
            <li>weken: <?php echo $weken ?></li>
            <li>maanden: <?php echo $maanden ?></li>
            <li>jaren: <?php echo $jaren ?></li>
        </ul>
	</body>
</html>