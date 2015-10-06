<?php
    $get = array();
    $get2 = array();
    $getal = 0;
    while( $getal < 100)
    {
        $get[] = $getal;
        $getal++;
        
        if($getal % 3 ==0 && $getal > 40 && $getal < 80)
        {
            $get2[] = $getal;
        }
    }
    $getallen = implode(', ', $get);
    $getallen2 = implode(', ', $get2);
?>
	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <h1>deel 1</h1>
   <p>getallen van 0 tot 100: <?php echo $getallen ?></p>
   <p>getallen die deelbaar zijn door 3 én groter zijn dan 40 mààr kleiner zijn dan 80: <?php echo $getallen2 ?></p>
</body>
</html>


