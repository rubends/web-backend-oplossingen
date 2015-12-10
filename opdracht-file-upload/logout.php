<?php
	session_start();
	setcookie('login',$cookieValue, time() - 60*60*24); 
	$_SESSION['notification'] = "Uitgelogd"; 
	header("Location: login-form.php?");
?>