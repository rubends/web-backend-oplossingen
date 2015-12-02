<?php

	$message = "";

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'password' );

		if(isset($_POST["delete"]))
		{
			$deleted = $_POST["delete"];

			$deleteQuery = 'DELETE FROM brouwers WHERE brouwernr = :brouwernr';
			$delete = $db->prepare($deleteQuery);
			$delete->bindValue(":brouwernr", $deleted);

			try
			{
				$delete->execute();
				$message = "De datarij werd goed verwijderd.";
			}
			catch(exception $e)
			{
				$message = "De datarij kon niet verwijderd worden. Probeer opnieuw.";
			}
		}

		$brouwersQuery = "SELECT * FROM brouwers";
		$brouwers = $db->prepare($brouwersQuery);
		$brouwers->execute();

		$bierenArr = array();

		while($bier = $brouwers->fetch(PDO::FETCH_ASSOC))
		{
			$bierenArr[] = $bier;
		}
		$tTitel = array();
		foreach($bierenArr[1] as $titel => $bier)
        {
            $tTitel[] = $titel;
        }


	}
	catch (exception $e)
	{
		$message = "connectie niet gelukt";
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD delete</title>
</head>
<body>

	<?= $message ?>
	<form action="oplossing-CRUD-delete.php" method="POST">
		<table>
			<thead>
				<tr>
					<?php foreach ($tTitel as $kolom): ?>
                    <th><?= $kolom ?></th>
                	<?php endforeach ?>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($bierenArr as $key => $brouw): ?>
					<tr>
						<td><?= $key ?></td>
						<?php foreach ($brouw as $value): ?>
							<td><?= $value ?></td>
						<?php endforeach ?>
						<td>
							<button type="submit" name="delete" value="delete"></button>
						</td>
					</tr>
				<?php endforeach ?>
				
			</tbody>

		</table>
	</form>
</body>
</html>