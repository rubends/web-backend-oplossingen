<?php

	session_start();
	if (isset($_POST['generate'])) {
		$_SESSION['pass'] = generatePassword();
		$_SESSION['email'] = $_POST['email'];
		header("Location: registratie-form.php?");
	}

	function generatePassword() {
			$password = "";
			$passLength = 10;
			//ASCII 48-122 = alles
			for ($index=0; $index <= $passLength ; $index++) { 
				$char = rand(48, 122);
				$password .= chr($char);
			}
			
			return $password;
	}

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'password' );

		if (isset($_POST['register'])) {
			$mail = $_POST['email'];
			if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		    	$_SESSION['notification'] = "Invalid email format"; 
			  	header("Location: registratie-form.php?");
			}

			$usersQuery = 'SELECT email FROM users';
			$users = $db->prepare($usersQuery);
			$users->execute();

			$insertQuery = 'INSERT INTO users (email, salt, hashed_password, last_login_time) 
							values (:email, :salt, :hashed_password, :last_login_time)';
			$insert = $db->prepare($insertQuery);
			->bindvalue
			$insert->execute();
			while ($useradres = $users->fetch(PDO::FETCH_ASSOC))
	        {
	            if($mail == $useradres)
	            {
	            	$_SESSION['notification'] = "Dit emailadres is al in gebruikt"; 
			  		header("Location: registratie-form.php?");
	            }
	        }



		}
	}
	catch(exception $e)
	{
		$_SESSION['notification'] = "connectie niet gelukt";
		header("Location: registratie-form.php?");
	}

?>