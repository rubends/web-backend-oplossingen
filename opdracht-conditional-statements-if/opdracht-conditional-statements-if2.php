<?php
    $getal = 1;
    $dag;
    
    if ( $getal == 1 ) 
    { 
        $dag = 'maandag'; 
    }
      
    if ( $getal == 2 ) 
    { 
        $dag = 'dinsdag'; 
    } 
      
    if ( $getal == 3 ) 
    { 
        $dag = 'woensdag'; 
    } 
      
    if ( $getal == 4 ) 
    { 
        $dag = 'donderdag'; 
    } 
      
    if ( $getal == 5 ) 
    { 
        $dag = 'vrijdag'; 
    } 
      
    if ( $getal == 6 ) 
    { 
        $dag = 'zaterdag'; 
    } 
      
    if ( $getal == 7 ) 
    { 
        $dag = 'zondag'; 
    }

    $upperDag = strtoupper($dag);
    $replA = str_replace("A","a",$upperDag);
    $lastA = strrpos($upperDag, "A");
    $minLastA = substr_replace($upperDag,"a",$lastA,1);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>if</title>
</head>
<body>
    <h1>Deel 2</h1>
    <?php echo $upperDag ?><br>
    <?php echo $replA ?> <br>
    <?php echo $minLastA ?> 
</body>
</html>