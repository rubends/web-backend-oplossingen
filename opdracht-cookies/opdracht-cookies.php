<?php 
    $data =	file_get_contents("data.txt");
	$user =	explode(",", $data );
    $users = count($user);
    $ingelogd = false;
    $message = "";
    if( !isset($_COOKIE['loggedin']))
    {
        
       if (isset($_POST["submit"]))
        {
            for ($id = 0; $id < $users; $id = $id+2)
            {
			if ($_POST["name"] == $user[$id] && $_POST["password"] == $user[$id+1])
			{
                if(!isset($_POST["check"]))
                {
				    setcookie('loggedin', $_POST["name"], time()+360);
                }
                else
                {
                    setcookie('loggedin', $_POST["name"], time()+2592000);      
                }
				header("location: opdracht-cookies.php");
			}
            else
            {
                $message = "Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
            }
            }
            
        }
    }
    else
    {
        $ingelogd = true;
        $message = "Hallo " . $_COOKIE["loggedin"] . ", fijn dat je er weer bij bent!";
    }

    if (isset($_GET["logout"]))
    {
        setcookie("loggedin", $_POST["name"], time()-2592000);
        header("location: opdracht-cookies.php");
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>
<body>
   <h1>Inloggen</h1>
   <?php echo $message ?>
   <?php if (!$ingelogd): ?>
    <form action="opdracht-cookies.php" method="post">
				<ul>
					<li>
						<label for="username">gebruikersnaam </label>
						<input type="text" name="name" id="name">
					</li>
					<li>
						<label for="password">paswoord </label>
						<input type="password" name="password" id="password">
					</li>
					<li>
						<label for="check">mij onthouden </label>
						<input type="checkbox" name="check" id="check">
					</li>
				</ul>
				<input type="submit" name="submit" value="Verzenden">
    </form>
    <?php else: ?>
    <a href="opdracht-cookies.php?logout=1">uitloggen</a>
    <?php endif ?>
</body>
</html>