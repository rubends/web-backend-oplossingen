<?php 
    session_start(); 

    if ( isset( $_GET['session'] ) )
    {
        header( 'location: opdracht-session.php' );
        
    }
    
    if(!isset($_GET["wijzig"]))
       {
           $_GET["wijzig"] = 0;
       }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>opdracht session</title>
</head>
<body>
  <h1>deel 1: registratiegegevens</h1>
   <form action="opdracht-session2.php" method="POST">
    <ul>
        <li>
            <label for="email">e-mail</label>
            <input type="email" id="email" name="email" value="<?= (isset($_SESSION['email']) ? $_SESSION['email'] : '') ?>" <?= ($_GET["wijzig"] == 1 ? "autofocus" : "") ?>>
        </li>
        <li>
            <label for="name">nickname</label>
            <input type="text" id="name" name="name" value="<?= (isset($_SESSION['name']) ? $_SESSION['name'] : '') ?>" <?= ($_GET["wijzig"] == 2 ? "autofocus" : "") ?>>
        </li>
        <input type="submit" name="submit" value="volgende">
    </ul>
    </form>
    
</body>
</html>