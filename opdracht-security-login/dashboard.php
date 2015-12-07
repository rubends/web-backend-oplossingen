<?php
	
	session_start();
	if(!isset($_COOKIE["login"]))
	{
		$_SESSION['notification'] = "U moet eerst inloggen"; 
		header("Location: login-form.php?");
	}
	else
	{
		$emailArr = explode(",",$_COOKIE["login"]);
		$email = $emailArr[0];
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'password' );
			$usersQuery = 'SELECT salt FROM users WHERE email LIKE :email';
			$users = $db->prepare($usersQuery);
			$users->bindvalue(':email', $email);
			$users->execute();
			$checkUser = array();
			while ($user = $users->fetch(PDO::FETCH_ASSOC))
		    {
		        $checkUser[] = $user;
		    }
		    $salt = $checkUser[0]['salt'];
		    $mailsalthash = hash('SHA512',  $email  . $salt);
		    if ($emailArr[1]==$mailsalthash) 
		    {
		    	
		    }
		    else 
		    {
		    	setcookie('login',$cookieValue, time() - 60*60*24); 
		    	$_SESSION['notification'] = "U moet eerst inloggen"; 
				header("Location: login-form.php?");
		    }

		}
		catch(exception $e)
		{

		}


	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<h1>Dashboard</h1>
		<a href="logout.php">uitloggen</a>
	</div>
	
</body>
</html>