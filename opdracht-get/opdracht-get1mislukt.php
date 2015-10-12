<?php
    $artikel1 = array("titel" => "Matt Damon: 'Als vader van vier zou ik best wat me-time op Mars kunnen gebruiken'", "tekst" => "Het zal je maar overkomen: astronaut Mark Watney wordt in de gloednieuwe film 'The Martian' door zijn teamleden voor dood achtergelaten op Mars, waardoor hij al zijn kennis en vindingrijkheid moet aanwenden om zijn collega's op aarde te laten weten dat hij nog in leven is. Dat het maar een eenzaam bestaan is, zo miljoenen kilometers verwijderd van onze planeet, hoeven we er niet meer bij te vertellen. Maar met vier kinderen in huis, grapt hoofdrolspeler Matt Damon dat hij het niet erg vinden om eens eventjes helemaal op zichzelf te zijn.", "foto" => "img/matdamon.jpg", "fotobeschrijving" => "Matt Damon op mars" );
    $artikel2 = array("titel" => "Piloot verliest bewustzijn tijdens vlucht", "tekst" => "Amper een dag na een incident met een zieke piloot van American Airlines heeft een piloot van United Airlines het bewustzijn verloren in de cockpit. De vlucht van Houston naar San Francisco maakte een gedwongen landing in New Mexico. Het toestel werd veilig aan de grond gezet en de piloot kon op eigen kracht het vliegtuig verlaten.", "foto" => "img/vliegtuig.jpg", "fotobeschrijving" => "een vliegtuig");
    $artikel3 = array("titel" => "Jonge toeriste sterft na beet van giftige kwal", "tekst" => "Een jonge Duitse toeriste is overleden in Thailand. De 20-jarige werd gebeten door een kwal en dat werd haar fataal. Haar vriendin die haar uit het water hielp, werd op haar gestoken en ligt in het ziekenhuis.", "foto" => "img/buitenland.jpg", "fotobeschrijving" => "een boot op strand");
    

    $krant = array( $artikel1, $artikel2, $artikel3);
    $aantal = count($krant);
    $ids = range(0, $aantal-1);

    if ( isset ( $_GET['id'] )  == false)
	{
		$_GET['id'] = "0";
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>get</title>
    <style>
        .artikel
        {
            border: 5px solid black;
            width: 30%;;
            
            padding: 1%;
            float: left;
        }
        .pic
        {
            width: 70%;
        }
    </style>
</head>
<body>
    <h1>deel 1</h1>
    <?php if ( isset ( $_GET['id'] ) )  : ?>
    <?php if (in_array($_GET["id"], $ids)) : ?>
       <!-- als het tekst is ga het naar 0 -->
    <div class="krant">
        <?php for ($i = 0; $i < $aantal; ++$i): ?>
        <div class="artikel">
            <h2><?php echo $krant[$i]['titel']?></h2>
            <img class="pic" src="<?php echo $krant[$i]['foto']?>" alt=<?php echo $krant[$i]['fotobeschrijving']?>>
            <p><?php echo $krant[$i]['fotobeschrijving']?></p>
            <?php if ($i != $_GET["id"] || in_array($_GET["id"], $krant[$i]['tekst'], false)) : ?>
            <h3><?php echo substr($krant[$i]['tekst'], 0, 50). "..." ;?></h3>
            <a href="opdracht-get1.php?id=<?php echo $i ?>">Lees meer</a>
            <?php else : ?>
            <h3><?php echo $krant[$i]['tekst'] ?></h3>
            <?php endif ?>
        </div>
        <?php endfor ?>
    </div>
    
    <?php else : ?>
        <h1>Artikel bestaat niet.</h1>
    <?php endif ?>
    
    <?php else : ?>
        <div class="krant">
        <?php for ($i = 0; $i < $aantal; ++$i): ?>
        <div class="artikel">
            <h2><?php echo $krant[$i]['titel']?></h2>
            <img class="pic" src="<?php echo $krant[$i]['foto']?>" alt=<?php echo $krant[$i]['fotobeschrijving']?>>
            <p><?php echo $krant[$i]['fotobeschrijving']?></p>
            <h3><?php echo substr($krant[$i]['tekst'], 0, 50). "..." ;?></h3>
            <a href="opdracht-get1.php?id=<?php echo $i ?>">Lees meer</a>
        </div>
        <?php endfor ?>
        </div>
    <?php endif ?>
    <form action="opdracht-get1.php" method="get">
        <label for="search"></label>
        <input type="text" name="search">
        <input type="submit" value="search">
    
    </form>
</body>
</html>