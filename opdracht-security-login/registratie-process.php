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
		$mail = $_POST['email'];
		$salt = uniqid();
		$pass = hash('SHA512', $salt . $_POST['password']);
		$lastlogin = date('Y-m-d H:i:s');

		if (isset($_POST['register'])) {
			
			if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		    	$_SESSION['notification'] = "Invalid email format"; 
			  	header("Location: registratie-form.php?");
			}

			$usersQuery = 'SELECT email FROM users WHERE email LIKE :email';
			$users = $db->prepare($usersQuery);
			$users->bindvalue(':email', $mail);
			$users->execute();
			$checkUser = array();
			while ($user = $users->fetch(PDO::FETCH_ASSOC))
	        {
	            $checkUser[] = $user;
	        }

			$insertQuery = 'INSERT INTO users (email, salt, hashed_password, last_login_time) 
							values (:email, :salt, :hashed_password, :last_login_time)';
			$insert = $db->prepare($insertQuery);
			$insert->bindvalue(':email', $mail);
			$insert->bindvalue(':salt', $salt);
			$insert->bindvalue(':hashed_password', $pass);
			$insert->bindvalue(':last_login_time', $lastlogin);
			
	        if (count($checkUser)>0) {
	        	$_SESSION['notification'] = "Dit emailadres is al in gebruikt"; 
			  	header("Location: registratie-form.php?");
	        }
	        else 
	        {
	        	try
	        	{
	        		$insert->execute();
	        		$cookieValue = $mail  . "," . hash('SHA512',  $mail  . $salt);
	        		setcookie('login',$cookieValue, time() + 60*60*24); 
			  		header("Location: dashboard.php?");
	        	}
	        	catch (exception $e)
	        	{
	        		$_SESSION['notification'] = "Insert niet gelukt"; 
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