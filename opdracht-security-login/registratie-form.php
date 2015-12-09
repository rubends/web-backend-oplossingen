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
	<title>Security</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Registeren</h1>
		<?= (isset($_SESSION['notification']) ? $_SESSION['notification'] : "") ?>
		<form action="registratie-process.php" method="POST">
			<ul>
				<li>
				<label for="email">e-mail</label>
				<input type="email" name="email" value="<?php echo (isset($_SESSION['email']) ? $_SESSION['email'] : "") ?>">
				</li>
				<li>
				<label for="password">password</label>
				<input type="<?php echo (isset($_SESSION['pass']) ? "text" : "password") ?>" name="password" value="<?php echo (isset($_SESSION['pass']) ? $_SESSION['pass'] : "") ?>">
				<input type="submit" name="generate" value="Genereer een paswoord">
				</li>
			</ul>
			<input type="submit" name="register" value="Registreer">
		</form>
	</div>
</body>
</html>