<?php

	$jaar =	2015;
	$schrikkel 	= 	false;

	if ( ( ( $jaar % 4 == 0 ) && ( $jaar % 100 != 0 ) ) || ( $jaar % 400 == 0 )  )
	{
		$schrikkel = true;
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>if else</title>
	</head>
	<body>
		<h1>Deel 1</h1>
        <p><?php echo $jaar ?> is <?php 
            if ( $schrikkel ) 
            {
            echo "een";
            }
            else 
            {echo "geen";}  ?> schrikkeljaar </p>
	</body>
</html>