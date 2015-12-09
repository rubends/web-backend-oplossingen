<?php
	session_start();
	if (isset($_COOKIE[login])) {
		header("Location: dashboard.php?");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Inloggen</h1>
		<?= (isset($_SESSION['notification']) ? $_SESSION['notification'] : "") ?>
		<form action="login-process.php" method="POST">
			<ul>
				<li>
				<label for="email">e-mail</label>
				<input type="email" name="email">
				</li>
				<li>
				<label for="password">password</label>
				<input type="password" name="password">
				</li>
			</ul>
			<input type="submit" name="login" value="Inloggen">
		</form>
		<p>Nog geen account? Maak er dan eentje op de <a href="registratie-form.php">registratiepagina</a></p>
	</div>
</body>
</html>