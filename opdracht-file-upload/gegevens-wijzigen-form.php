<?php
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		$_SESSION['notification'] = "U moet eerst inloggen"; 
		header("Location: login-form.php?");
	}
	else
	{
		$email = $_SESSION['email'];
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', 'password' );
			$usersQuery = 'SELECT * FROM users WHERE email LIKE :email';
			$users = $db->prepare($usersQuery);
			$users->bindvalue(':email', $email);
			$users->execute();
			$checkUser = array();
			while ($user = $users->fetch(PDO::FETCH_ASSOC))
		    {
		        $checkUser[] = $user;
		    }
		    $profo = $checkUser[0]['profile_picture'];
		    $_SESSION['id'] = $checkUser[0]['id'];

		}
		catch(exception $e)
		{
			$_SESSION['notification'] = "Connectie niet gelukt"; 
			header("Location: login-form.php?");
		}


	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gegevens wijzigen</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style>
		.profo {
			max-width: 400px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Gegevens wijzigen</h1>
		<?= (isset($_SESSION['notification']) ? $_SESSION['notification'] : "") ?>
		<form action="gegevens-bewerken.php" method="POST" enctype="multipart/form-data">
			<ul>
				<li>Profielfoto: <img class="profo" src="img/<?= (isset($profo) ? $profo : "default.jpg") ?>" alt="<?= (isset($email) ? $email : "default") ?>"> <input type="file" name="file" value="Choose file"></li>
				<li>Email: <input type="email" name="email" value="<?= (isset($email) ? $email : "") ?>"></li>
			</ul>
			<input type="submit" name="wijzig" value="Gegevens wijzigen">
		</form>
		<a href="dashboard.php">Terug naar dashboard</a>
	</div>
</body>
</html>