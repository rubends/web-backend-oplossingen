<?php
    $message = "";

    try
    {
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'password' );
        
        $queryString = 'SELECT brouwernr, brnaam FROM brouwers';;
        $brouwers = $db->prepare($queryString);
        $brouwers->execute();
        $brouwArr = array();
        while ($brouwernaam = $brouwers->fetch(PDO::FETCH_ASSOC))
        {
            $brouwArr[] = $brouwernaam;
        }

        if(isset($_GET["brouwernr"]))
        {
            $brouwer = $_GET["brouwernr"];
            $brouwerQuery  = 'SELECT bieren.naam FROM bieren WHERE bieren.brouwernr = :brouwernr';
            $brouwerBieren = $db->prepare($brouwerQuery);
            $brouwerBieren->bindParam( ':brouwernr', $_GET['brouwernr']);
            $brouwerBieren->execute();
            $bieren = array();
            while ($bier = $brouwerBieren->fetch(PDO::FETCH_ASSOC))
            {
                $bieren[] = $bier;
            }
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
    <title>CRUD query deel 2</title>
</head>
<body>
    <?php echo $message?>
    <form action="opdracht-CRUD-query-deel2.php" method="GET">
        <select name="brouwernr">
            <?php foreach ($brouwArr as $naam): ?>
                <option value="<?= $naam['brouwernr'] ?>"><?= $naam['brnaam'] ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" name="submit" value="Geef alle bieren van deze brouwerij">
    </form>
    <table>
        <thead>
                <tr>
                    <th>biernummer</th>
                    <th>bier</th>
                </tr>
        </thead>
        <tbody>
                <?php foreach ($bieren as $key => $bier): ?>
                <tr>
                    <td><?= $key +1 ?></td>
                    <?php foreach ($bier as $naam): ?>
                    <td><?= $naam ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>