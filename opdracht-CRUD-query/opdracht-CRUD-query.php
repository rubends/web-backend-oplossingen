<?php
    $message = "";

    try
    {
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'password' );
        
        $queryString = 'SELECT * FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr WHERE bieren.naam LIKE "Du%" AND brouwers.brnaam LIKE "%a%"';
        $bieren = $db->prepare($queryString);
        $bieren->execute();
        $bierArr = array();
        while ($bier = $bieren->fetch(PDO::FETCH_ASSOC))
        {
            $bierArr[] = $bier;
        }

        $biermerken = array();
        foreach($bierArr[1] as $merk => $bier)
        {
            $biermerken[] = $merk;
        }
    }
    catch (Exception $e)
    {
        $message = "Connectie is niet gelukt.";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD query</title>
</head>
<body>
    <?php echo $message?>
    <table>
        
        <thead>
            <tr>
                <?php foreach ($biermerken as $biermerk): ?>
                    <th><?= $biermerk ?></th>
                <?php endforeach ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($bierArr as $bierdetails): ?>
                <tr>
                    <?php foreach ($bierdetails as $detail): ?>
                    <td><?= $detail ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            
        </tbody>

    </table>
</body>
</html>