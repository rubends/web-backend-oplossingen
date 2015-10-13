<?php
    $user = "Ruben";
    $pass = "learnsphp";
    
    $message = "";

    if(isset ($_POST["submit"]))
    {
        $inputname = $_POST["username"];
        $inputpass = $_POST["password"];
        if($inputname !== $user || $inputpass !== $pass)
        {
            $message =  "er ging iets mis bij het inloggen, probeer opnieuw";
        }
        else
        {
            $message =  "welkom.";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>post</title>
</head>
<body>
    <h1>Inloggen</h1>
    <p>opdracht post</p>
    <form action="opdracht-post.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" value="your username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" value="your password" id="password">
        <input type="submit" name="submit" value="submit">
        <p><?php echo $message ?></p>
    </form>
</body>
</html>