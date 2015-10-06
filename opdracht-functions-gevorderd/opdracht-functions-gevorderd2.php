<?php

	$pigHealth = 5;
    $maximumThrows = 8;
    $game = array();

    function calculateHit()
    {
        global $pigHealth;
        $left = array();
        $raakkans = rand(0,9);
        $raak = ($raakkans < 4) ? true : false;
        if($raak)
        {
            $pigHealth--;
            $left['pigs'] = "raak, er zijn nog maar " . $pigHealth . " varkens over.";
        }
        else 
        {
            $left['pigs'] = "mis, er zijn nog " . $pigHealth . " varkens over.";
        }
        return $left;
    }

    function launchAngryBird()
    {
        global $pigHealth;  
        global $maximumThrows;
        global $game; //anders herkent de functie het ni
        if($maximumThrows != 0 && $pigHealth > 0)
        {
            $hit = calculateHit();
            $maximumThrows--;
            $game[] = $hit['pigs'];
            launchAngryBird();
        }
        else
        {
            if($pigHealth == 0)
            {
                $game[] = "gewonnen!";
                //exit();
            }
            else
            {
                $game[] = "verloren!";
            }
            
        }
    }

    launchAngryBird();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>functions voor gevorderden</title>
</head>
<body>
    <h1>deel 2</h1>
    <?php foreach( $game as $result ): ?>
        <li><?= $result ?></li>
    <?php endforeach ?>
</body>
</html>