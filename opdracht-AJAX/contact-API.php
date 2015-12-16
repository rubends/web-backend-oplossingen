<?php
	session_start();
	if (isset($_POST["email"]) && isset($_POST["msg"])) {
		$admin = "rubendeswaef@gmail.com";
		try 
		{
			$db = new PDO('mysql:host=localhost;dbname=opdracht-ajax', 'root', 'password' );
			$dbQuery = 'INSERT INTO contact_messages(Email, Message, time_sent) values (:email, :msg, :time)';
			$statement = $db->prepare($dbQuery);
			$statement->bindvalue(':email', $_POST["email"]);
			$statement->bindvalue(':msg', $_POST["msg"]);
			$statement->bindvalue(':time', date("Y-m-d H:i:s"));
			$statement->execute();
			mail($admin, "bericht van " . $_POST["email"], $_POST["msg"], $headers);
			if (isset($_POST["copy"])) {
				$headers = 'From: ' . $admin;
				mail($_POST["email"], "Jouw bericht", $_POST["msg"], $headers);
			}

			$_SESSION["notification"] = "Mail verzonden";
			unset($_POST["msg"]);
			header("Location: contact-form.php");
		} 
		catch (Exception $e) 
		{
			$_SESSION["notification"] = "Connectie mislukt";
			header("Location: contact-form.php");
		}
	}
	else
	{
		$_SESSION["notification"] = "Gelieve alle velden in te vullen";
		header("Location: contact-form.php");
	}
	//test
?>