<?php 
    session_start(); 

    if ( isset( $_GET['session'] ) )
    {
       if ( $_GET['destroy'] == '1')
        {
            session_destroy( );
            header( 'location: opdracht-session2.php' );
        }
        
    }
    if (isset($_POST['submit'])) { 
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['name'] = $_POST['name'];
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
    <title>opdracht session2</title>
</head>
<body>
  <h1>registratiegegevens</h1>
   <ul>
        <li><p>email: <?php echo $_SESSION["email"] ?></p></li>
        <li><p>nickname: <?php echo $_SESSION["name"] ?></p></li>
    </ul>
  
  <h1>deel 2: adres</h1>
   <form action="opdracht-session3.php" method="POST">
    <ul>
        <li>
            <label for="straat">straat</label>
            <input type="text" id="straat" name="straat" value="<?= (isset($_SESSION['straat']) ? $_SESSION['straat'] : '') ?>" <?= ($_GET["wijzig"] == 3 ? "autofocus" : "") ?>>
        </li>
        <li>
            <label for="nummer">nummer</label>
            <input type="text" id="nummer" name="nummer" value="<?= (isset($_SESSION['nummer']) ? $_SESSION['nummer'] : '') ?>" <?= ($_GET["wijzig"] == 4 ? "autofocus" : "") ?>>
        </li>
        <li>
            <label for="gemeente">gemeente</label>
            <input type="text" id="gemeente" name="gemeente" value="<?= (isset($_SESSION['gemeente']) ? $_SESSION['gemeente'] : '') ?>" <?= ($_GET["wijzig"] == 5 ? "autofocus" : "") ?>>
        </li>
        <li>
            <label for="postcode">postcode</label>
            <input type="text" id="postcode" name="postcode" value="<?= (isset($_SESSION['postcode']) ? $_SESSION['postcode'] : '') ?>" <?= ($_GET["wijzig"] == 6 ? "autofocus" : "") ?>>
        </li>
        <input type="submit" name="submit2" value="volgende">
    </ul>
    </form>
    <a href="opdracht-session2.php?destroy=1">destroy sessie</a>
</body>
</html>