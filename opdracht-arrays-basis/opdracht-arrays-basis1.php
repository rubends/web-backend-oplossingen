<?php
    $dieren = array('muis', 'olifant', 'eend', 'krokodil', 'vogelbekdier');
    $dieren [] = 'aap';
    $dieren [] = 'kikker';
    $dieren [] = 'flamingo';
    $dieren [] = 'kat';
    $dieren [] = 'hond';
  
    $voertuigen = array( 'land' => array('vespa', 'fiets'), 'water' => array ('surfplank', 'vlot', 'schoener', 'driemaster'), 'lucht' => array ('ballon', 'heli', 'B52'));
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>arrays</title>
</head>
<body>
    <h1>Deel 1</h1>
    
    <?php var_dump ($voertuigen) ?>
</body>
</html>