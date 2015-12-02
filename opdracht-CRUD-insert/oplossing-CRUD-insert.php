<?php

	$message = "";

	if(isset($_POST[ 'submit' ]))
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'password' );
			$brouwerQuery = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet) 
							values (:brnaam, :adres, :postcode, :gemeente, :omzet)';
			$brouwer = $db->prepare($brouwerQuery);
			$brouwer->bindValue(':brnaam', $_POST['brnaam']);
			$brouwer->bindValue(':adres', $_POST['adres']);
			$brouwer->bindValue(':postcode', $_POST['postcode']);
			$brouwer->bindValue(':gemeente', $_POST['gemeente']);
			$brouwer->bindValue(':omzet', $_POST['omzet']);

			try
			{
				$brouwerAdd = $brouwer->execute();
				$insertID = $db->lastInsertId(); //!!!
				$message = "brouwerij toegevoegd met brouwerijnummer ".$insertID;

			}
			catch (exception $e)
			{
				$message = "brouwer niet kunnen toevoegen";
			}


		}
		catch (exception $e)
		{
			$message = "connectie niet gelukt";
		}
	}



?>
<!DOCTYPE html>
<html>
	<head>
		<title>CRUD insert</title>
	</head>
<body>

	<h1>Voeg een brouwer toe</h1>
	
	<?= $message ?>

	<form action="oplossing-CRUD-insert.php" method="POST">
		
		<ul>
			<li>
				<label for="brnaam">Brouwernaam</label>
				<input type="text" name="brnaam" id="brnaam">
			</li>
			<li>
				<label for="adres">adres</label>
				<input type="text" name="adres" id="adres">
			</li>
			<li>
				<label for="postcode">postcode</label>
				<input type="text" name="postcode" id="postcode">
			</li>
			<li>
				<label for="gemeente">gemeente</label>
				<input type="text" name="gemeente" id="gemeente">
			</li>
			<li>
				<label for="omzet">omzet</label>
				<input type="text" name="omzet" id="omzet">
			</li>
		</ul>
		
		<input type="submit" value="Verzenden" name="submit">
	</form>

</body>
</html>