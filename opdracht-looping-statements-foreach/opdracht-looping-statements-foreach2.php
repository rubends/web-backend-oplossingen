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
    $reverseUnique = array_unique($reverseText);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>looping foreach</title>
    <style>
        ul
        {
            float: left;
            list-style-type:none;
        }
    </style>
</head>
<body>
    <h1>Deel 2</h1>
    <?php echo "<ul><li>" . implode("</li><li>", $count) . "</li></ul>"; ?>
    <?php echo "<ul><li>" . implode("</li><li> x ", $reverseUnique) . "</li></ul>"; ?>
</body>
</html>