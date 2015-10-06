<?php
    $startmoney = 100000;
    $rente = 8;
    $jaar = 10;
    $count = 1;
    $histarray = array();

    function money($boekhouding)
    {
        
        
        if($boekhouding["jaar"] <= $boekhouding["tijd"])
        {
            $extra = floor(($boekhouding["rente"] / 100) * $boekhouding["bigspending"]);
            $boekhouding["bigspending"] += $extra;
            $boekhouding["bkhdn"][$boekhouding["jaar"]] = "bedrag = " . $boekhouding["bigspending"] . "€ waaruit " . $extra ."€ de rente is";
            $boekhouding["jaar"]++;
            return money($boekhouding);
        }
        else
        {
            return $boekhouding;
        }
    }
    
    $banking = array("bigspending" => $startmoney, "rente" => $rente, "tijd" => $jaar, "jaar" => $count, "bkhdn" => $histarray);

    $profit = money($banking);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>functions: recursive</title>
</head>
<body>
    <h1>deel 2</h1>
    <?php foreach($profit["bkhdn"] as $value): ?>
        <li><?php echo $value ?></li>
    <?php endforeach ?>
</body>
</html>