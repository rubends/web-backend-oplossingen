<?php
    $artikel1 = array("titel" => "Matt Damon: 'Als vader van vier zou ik best wat me-time op Mars kunnen gebruiken'", "tekst" => "Het zal je maar overkomen: astronaut Mark Watney wordt in de gloednieuwe film 'The Martian' door zijn teamleden voor dood achtergelaten op Mars, waardoor hij al zijn kennis en vindingrijkheid moet aanwenden om zijn collega's op aarde te laten weten dat hij nog in leven is. Dat het maar een eenzaam bestaan is, zo miljoenen kilometers verwijderd van onze planeet, hoeven we er niet meer bij te vertellen. Maar met vier kinderen in huis, grapt hoofdrolspeler Matt Damon dat hij het niet erg vinden om eens eventjes helemaal op zichzelf te zijn.", "foto" => "img/matdamon.jpg", "fotobeschrijving" => "Matt Damon op mars" );
    $artikel2 = array("titel" => "Piloot verliest bewustzijn tijdens vlucht", "tekst" => "Amper een dag na een incident met een zieke piloot van American Airlines heeft een piloot van United Airlines het bewustzijn verloren in de cockpit. De vlucht van Houston naar San Francisco maakte een gedwongen landing in New Mexico. Het toestel werd veilig aan de grond gezet en de piloot kon op eigen kracht het vliegtuig verlaten.", "foto" => "img/vliegtuig.jpg", "fotobeschrijving" => "een vliegtuig");
    $artikel3 = array("titel" => "Jonge toeriste sterft na beet van giftige kwal", "tekst" => "Een jonge Duitse toeriste is overleden in Thailand. De 20-jarige werd gebeten door een kwal en dat werd haar fataal. Haar vriendin die haar uit het water hielp, werd op haar gestoken en ligt in het ziekenhuis.", "foto" => "img/buitenland.jpg", "fotobeschrijving" => "een boot op strand");
    

    $krant = array( $artikel1, $artikel2, $artikel3);
        
    $artikel = false;
    $existing = false;
    
    if (isset($_GET["key"]))
	{
        if($_GET["key"]<count($krant))
        {
            $key = $_GET["key"];
            if (array_key_exists($key, $krant))
            {
                $krant = array($krant[$key]);
                $artikel = true;
            }
            else
            {
                $existing =	true;
            }
        }
        else
        {
            echo "Het artikel dat u zoekt is onbestaand";
        }
    }
    if (isset($_GET["search"]))
	{
            $search = $_GET["search"];
            if (strpos($artikel1["tekst"], $search) !== false)
            {
                $krant = array($krant[0]);
            }
            else if (strpos($artikel2["tekst"], $search) !== false)
            {
                $krant = array($krant[1]);
            }
            else if (strpos($artikel3["tekst"], $search) !== false)
            {
                $krant = array($krant[2]);
            }
            else
            {
                echo "Het artikel dat u zoekt is onbestaand";
            }  
    }
//    if (isset($_GET["search"]) || $_GET["search"] = null)
//	{
//        $search = $_GET["search"];
//    
//        foreach($krant as $key => $artikel)
//        {
//            if(strpos($artikel["tekst"], $search) !== false)
//            {
//                echo $artikel["tekst"];
//            }
//        }
//    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>get</title>
    <style>
        .gazet div {
            width: 20%;
            float: left;
            border: 1px solid black;
            padding: 2%;
            min-height: 500px;
        }
        img {
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>deel 1</h1>
    <?php if(!$existing): ?>
    <div class="gazet">
        <?php foreach($krant as $key => $artikel) : ?>
        <div>
            <h2><?php echo $artikel['titel']?></h2>
            <img class="pic" src="<?php echo $krant[$key]['foto']?>" alt=<?php echo $artikel['fotobeschrijving']?>>
            <p><?php echo $artikel['fotobeschrijving']?></p>
            <?php if (!empty($_GET)) : ?> 
                <h3><?php echo $artikel['tekst'] ?></h3>
            <?php else : ?>
                <h3><?php echo substr($artikel['tekst'], 0, 50). "..." ;?></h3>
                <a href="opdracht-get1.php?key=<?php echo $key ?>">Lees meer</a>
            <?php endif ?>
        </div>
        <?php endforeach ?>
    </div>
    <?php endif ?>
    <form action="opdracht-get1.php" method="get">
        <label for="search"></label>
        <input type="text" name="search">
        <input type="submit" value="search">
    </form>
</body>
</html>
