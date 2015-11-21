<?php
    $message = "";
    $bieren = array();
    $primary = array();

    try
    {
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'password' );
        
        $queryString = 'SELECT *FROM bieren INNER JOIN brouwersON bieren.brouwernr = brouwers.brouwernrWHERE bieren.naam LIKE "Du%"AND brouwers.brnaam LIKE "%a%"';

        $exe = $db->prepare($queryString);
        $exe->execute();

        while ($rij = $exe->fetch(PDO::FETCH_ASSOC))
        {
            $bieren[] = $rij;
        }
        $primary[] = 'biernr (PK)';
        foreach($bieren[0] as $key => $bier)
        {
            $primary[] = $key;
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
                <?php foreach($primary as $kolom):?>
                    <th><?= $kolom ?></th>
                <?php endforeach?>
            </tr>
        </thead>

        <tbody>
        
            <?php foreach ($bieren as $key => $bier): ?>
                <tr>
                    <td><?= ($key + 1) ?></td>
                    <?php foreach ($bier as $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
            
        </tbody>

    </table>
</body>
</html>