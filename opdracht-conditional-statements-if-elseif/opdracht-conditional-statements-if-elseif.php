<?php

	$getal 		=	55;
    $grens1;
    $grens2;
    
    if($getal >= 0 && $getal < 10)
    {
        $grens1 = 0;
        $grens2 = 10;
    }
    else if($getal >= 10 && $getal < 20)
    {
        $grens1 = 10;
        $grens2 = 20;
    }
    else if($getal >= 20 && $getal < 30)
    {
        $grens1 = 20;
        $grens2 = 30;
    }
    else if($getal >= 20 && $getal < 30)
    {
        $grens1 = 20;
        $grens2 = 30;
    }
    else if($getal >= 30 && $getal < 40)
    {
        $grens1 = 30;
        $grens2 = 40;
    }
    else if($getal >= 40 && $getal < 50)
    {
        $grens1 = 40;
        $grens2 = 50;
    }
    else if($getal >= 50 && $getal < 60)
    {
        $grens1 = 50;
        $grens2 = 60;
    }
    else if($getal >= 60 && $getal < 70)
    {
        $grens1 = 60;
        $grens2 = 70;
    }
    else if($getal >= 70 && $getal < 80)
    {
        $grens1 = 70;
        $grens2 = 80;
    }
	
    else if($getal >= 80 && $getal < 90)
    {
        $grens1 = 80;
        $grens2 = 90;
    }
    else if($getal >= 90 && $getal < 100)
    {
        $grens1 = 90;
        $grens2 = 100;
    }

    $boodschap = "Het getal " . $getal . " ligt tussen " . $grens1 . " en " . $grens2;

    $omgedraaid = strrev($boodschap);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>if elsif</title>
</head>
<body>
    <p><?php echo $boodschap ?></p>
    <p><?php echo $omgedraaid ?></p>
</body>
</html>