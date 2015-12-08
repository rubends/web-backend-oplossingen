<?php
	session_start();
	try
	{
		$email = $_POST['email'];
		$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'password' );
		$userQuery = 'SELECT * FROM users WHERE email LIKE :email';
		$user = $db->prepare($userQuery);
		$user->bindvalue(':email', $email);
		$user->execute();
		$checkUser = array();
		while ($userinfo = $user->fetch(PDO::FETCH_ASSOC))
	    {
	        $checkUser[] = $userinfo;
	    }
	    if (count($checkUser)==0) {
        	$_SESSION['notification'] = "Dit emailadres wordt niet gebruikt"; 
		  	header("Location: login-form.php?");
        }
        else 
        {

        	$salt = $checkUser[0]['salt'];
        	$givenpass = hash('SHA512', $salt . $_POST['password']);

        	if ($givenpass!=$checkUser[0]['hashed_password']) {
        		$_SESSION['notification'] = "Fout passwoord"; 
		  		header("Location: login-form.php?");
        	}
        	else
        	{
        		$cookieValue = $email  . "," . hash('SHA512',  $email  . $salt);
	        	setcookie('login',$cookieValue, time() + 60*60*24); 
			  	header("Location: dashboard.php?");
        	}
        }
	}
	catch(exception $e)
	{
		$_SESSION['notification'] = "Connectie niet gelukt"; 
		header("Location: login-form.php?");
	}


?>