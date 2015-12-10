<?php
	
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		$_SESSION['notification'] = "U moet eerst inloggen"; 
		header("Location: login-form.php?");
	}
	else
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-file-upload', 'root', 'password' );
			$usersQuery = 'UPDATE users SET email=:email, profile_picture=:profo WHERE id=:id';
			$users = $db->prepare($usersQuery);
			$users->bindvalue(':email', $_POST['email']);
			$users->bindvalue(':profo', $_FILES["file"]["name"]);
			$users->bindvalue(':id', $_SESSION['id']);
			if (isset($_POST["wijzig"])) {

				define('ROOT', dirname(__FILE__));
				if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/png"))&& ($_FILES["file"]["size"] < 2000000)) 
				{
					move_uploaded_file($_FILES["file"]["tmp_name"], (ROOT . "/img/" . $_FILES["file"]["name"]));
					$users->execute();
					header("Location: gegevens-wijzigen-form.php?");
				}
			}
		}
		catch(exception $e)
		{
			$_SESSION['notification'] = "Connectie niet gelukt"; 
			header("Location: login-form.php?");
		}

	}

?>