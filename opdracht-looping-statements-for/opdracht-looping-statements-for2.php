<?php
	$tafels	= 10;
	$product =	10;
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>looping for</title>
    <style>
        .oneven { background-color : green; }
    </style>
</head>
<body>
    <h1>deel 2</h1>
    <table>
        <?php for ($i = 0; $i <= $tafels; $i++): ?>
        <tr> 
            <?php for ($j = 0; $j <= $product; $j++): ?> 
                <td class="<?= (($i*$j)%2>0) ? "oneven" : "" ?>"><?php echo ($i * $j) ?></td>
            <?php endfor ?>
        </tr>
        <?php endfor ?>
    </table>
</body>
</html>