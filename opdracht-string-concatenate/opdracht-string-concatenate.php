<?php
    $voornaam = "Ruben";
    $achternaam = "De Swaef";
    $volledigeNaam = $voornaam . " " . $achternaam;
    $lengte = strlen($volledigeNaam);
    
?>

<!DOCTYPE html>
<html>
	<body>
	    <?php echo $volledigeNaam?><br>
	    <?php echo $lengte ?>
	</body>
</html>