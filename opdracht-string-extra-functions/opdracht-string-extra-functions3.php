<?php
    $lettertje = "e";
    $cijfertje  = "3";
    $langsteWoord = "zandzeepsodemineralenwatersteenstralen";
    $replace = str_replace( $lettertje , $cijfertje, $langsteWoord );
?>

<!DOCTYPE html>
<html>
	<body>
        <h1>Deel 3</h1>
        <?php echo $replace ?>
	</body>
</html>