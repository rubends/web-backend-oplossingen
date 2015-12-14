<?php
	session_start();
	if (isset($_POST["email"]) && isset($_POST["msg"])) {
		$admin = "";
	}
	else
	{
		$_SESSION["notification"] = "Gelieve alle velden in te vullen";
		header("Location: contact-form.php");
	}

?>