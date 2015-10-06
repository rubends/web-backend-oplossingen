<?php
	$rijen = 10;
	$kolommen =	10;
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>looping for</title>
</head>
<body>
    <h1>deel 1</h1>
    <table>
        <?php for ($i = 0; $i < $rijen; $i++): ?>
        <tr> 
        <?php for ($j = 0; $j < $kolommen; $j++): ?> 
            <td>kolom</td>
        <?php endfor ?>
        </tr>
        <?php endfor ?>
    </table>
</body>
</html>