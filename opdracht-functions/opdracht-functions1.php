<?php

	function berekenSom($getal1,$getal2) 
	{
		$som = $getal1 + $getal2;
		return $som;
	}
    $optellen = berekenSom(20, 15);
	function vermenigvuldig($getal1,$getal2) 
	{
		$som = $getal1 * $getal2;
		return $som;
	}
    $vermenigvuldigen = vermenigvuldig(20,15);
	function isEven($getal1) 
	{
		if ($getal1 % 2 > 0)
		{
			return false;
		}
        else
        {
		return true;
        }
	}
    $even = isEven(8);
    function Stringtion($string)
    {
        $result['upper'] = strtoupper($string);
        $result['length'] = strlen($string);
        
        return $result;
    }
    $string = Stringtion('ik leer php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>functions</title>
</head>
<body>
   <h1>deel 1</h1>
    <p>20 + 15 = <?php echo $optellen ?></p>
    <p>20 * 15 = <?php echo $vermenigvuldigen ?></p>
    <p>is 8 even? (1 = even/ 0 = oneven) <?php echo $even ?></p>
    <p>"<?php echo $string['upper'] ?>" is <?php echo $string['length'] ?> characters groot</p>
</body>
</html>
</html>