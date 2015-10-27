<?php

    function __autoload($class)
    {
        include $class."s.php";
    }
    $tijger = new Animal("tijgertje", "female", 1000);
    $flamingo = new Animal("pinky", "male", 420);
    $kat = new Animal("miauw zedong", "male", 9999);
    
    $tijger->changeHealth(50);
    $kat->doSpecialMove();

    $simba = new Lion("Simba", "male", 100, "Congo lion");

    $zeke = new Zebra("zeke", "male", 420, "Quagga");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classes extends</title>
</head>
<body>
    <h1>Oplossing classes-extends</h1>
    <p><?php echo $tijger->getName() ?> is van het geslacht <?php echo $tijger->getGender() ?> en heeft <?php echo $tijger->getHealth() ?> punten</p>
    <p><?php echo $flamingo->getName() ?> is van het geslacht <?php echo $flamingo->getGender() ?> en heeft <?php echo $flamingo->getHealth() ?> punten</p>
    <p><?php echo $kat->getName() ?> is van het geslacht <?php echo $kat->getGender() ?> en heeft <?php echo $kat->getHealth() ?> punten</p>
    <h2>Leeuw</h2>
    <p>De speciale move van <?php echo $simba->getName() ?> (soort = <?php echo $simba->getSpecies() ?> ) : <?php echo $simba->doSpecialMove() ?></p>
    <h2>Zebra</h2>
    <p>De speciale move van <?php echo $zeke->getName() ?> (soort = <?php echo $zeke->getSpecies() ?> ) : <?php echo $zeke->doSpecialMove() ?></p>
</body>
</html>