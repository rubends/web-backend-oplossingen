<?php
    $getallen = array(1, 2, 3, 4, 5);
    $vermenigvuldig = array_product($getallen);

    $oneven;
    foreach ($getallen as $value)
    {
        if($value % 2 != 0)
        {
            $oneven [] = $value;
        }
    }

    $getallen2 = array(5, 4, 3, 2, 1);
    $optellen;
    foreach ($getallen as $key => $value)
    {
        $getal1 = $value;
        $getal2 = $getallen2[$key];
        $optellen[] = $getal1 + $getal2;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>arrays</title>
</head>
<body>
    <h1>Deel 2</h1>
    <p>het product: <?php echo $vermenigvuldig ?></p>
    <p>oneven: <?php var_dump( $oneven )?></p>
    <p>zelfde indexen optellen: <?php var_dump($optellen)?></p>
</body>
</html>