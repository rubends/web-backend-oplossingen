<?php
	$tafels	= 10;
	$product =	10;

    $tafelarray = array();
    
    for( $count = 0; $count <= $tafels; $count++)
    {
        $productarray = array();
        for ($prodcount =0; $prodcount <= $tafels; $prodcount++)
        {
            $productarray[] = $count * $prodcount;
        }
        $tafelarray[$count] = $productarray;
    }
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
    <h1>deel 3</h1>
    <table>
        <?php foreach($tafelarray as $productarray): ?>
        <tr> 
            <?php foreach ($productarray as $prod): ?> 
                <td class="<?= ($prod%2>0) ? "oneven" : "" ?>"><?php echo $prod ?></td>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
    </table>
    
</body>
</html>