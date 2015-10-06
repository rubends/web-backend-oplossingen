<?php

	$text =	file_get_contents("text-file.txt");
	$textChars = str_split($text);
	rsort($textChars);
	$reverseText = array_reverse($textChars);
	$count = array();
	foreach($reverseText as $value)
	{
		if (isset($count[$value]))
		{
			$count[$value]++;
		}
		else
		{
			$count[$value] = 1;
		}
		
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>looping foreach</title>
</head>
<body>
    <h1>Deel 1</h1>
    <?php var_dump ($count) ?>
</body>
</html>