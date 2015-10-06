<?php
    $boodschappenlijstje = array("eieren", "wijn", "waspoeder", "sandwiches", "kaas", "tomaten");
    $count = 0;
?>
	
<!-- W3 validator : 503 Service Unavailable -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <h1>deel 2</h1>
   <ul>
       <?php while(isset($boodschappenlijstje[$count])): ?>
            <li><?= $boodschappenlijstje[$count] ?></li>
        <?php $count ++ ?>
        <?php endwhile ?>
   </ul>
</body>
</html>


