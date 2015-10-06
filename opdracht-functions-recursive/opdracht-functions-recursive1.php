<?php
    $startmoney = 100000;
    $rente = 8;
    $jaar = 10;

    function money($spending, $rente, $tijd)
    {
        static $jaar = 1;
        static $boekhouding = array(); //anders werkt het ni, static nog eens nachecken! 
        
        if($jaar <= $tijd)
        {
            $extra = floor(($rente / 100) * $spending);
            $bigspending = $spending + $extra;
            $boekhouding[$jaar] = "bedrag = " . $bigspending . "€ waaruit " . $extra ."€ de rente is";
            $jaar++;
            //niet met tijd-- want dan hebt ge maar 50% vd antwoorden
            return money($bigspending, $rente, $tijd);
        }
        else
        {
            return $boekhouding;
        }
    }

    $profit = money($startmoney, $rente, $jaar);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>functions: recursive</title>
</head>
<body>
    <h1>deel 1</h1>
    <?php foreach($profit as $value): ?>
        <li><?php echo $value ?></li>
    <?php endforeach ?>
</body>
</html>