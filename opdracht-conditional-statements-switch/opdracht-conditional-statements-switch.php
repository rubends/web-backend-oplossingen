<?php

	$getal 	= 	6; 
    switch ($getal)
   	{
   		case '1':
   			$dag = 'maandag';
   			break;
   		case '2':
   			$dag = 'dinsdag';
   			break;
   		case '3':
   			$dag = 'woensdag';
   			break;
   		case '4':
   			$dag = 'donderdag';
   			break;
   		case '5':	
   			$dag = 'vrijdag';
   			break;
   		case '6':
   			$dag = 'zaterdag';
   			break;
   		case '7':
   			$dag = 'zondag';
   			break;
   		default:
   			$dag ='noidea';
   	}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>switch</title>
</head>
<body>
    <?php echo $dag ?>
</body>
</html>