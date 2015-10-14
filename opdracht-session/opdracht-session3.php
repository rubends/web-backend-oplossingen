<?php
    session_start(); 

    if ( isset( $_GET['session'] ) )
    {
        header( 'location: opdracht-session3.php' );
    }

    if (isset($_POST['submit2'])) { 
        $_SESSION['straat'] = $_POST['straat'];
        $_SESSION['nummer'] = $_POST['nummer'];
        $_SESSION['gemeente'] = $_POST['gemeente'];
        $_SESSION['postcode'] = $_POST['postcode'];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>opdracht session3</title>
</head>
<body>
  <h1>overzicht</h1>
   <ul>
        <li><p>email: <?php echo $_SESSION["email"] ?></p><a href="opdracht-session.php?wijzig=1">wijzig</a></li>
        <li><p>nickname: <?php echo $_SESSION["name"] ?></p><a href="opdracht-session.php?wijzig=2">wijzig</a></li>
        <li><p>straat: <?php echo $_SESSION["straat"] ?></p><a href="opdracht-session2.php?wijzig=3">wijzig</a></li>
        <li><p>nummer: <?php echo $_SESSION["nummer"] ?></p><a href="opdracht-session2.php?wijzig=4">wijzig</a></li>
        <li><p>gemeente: <?php echo $_SESSION["gemeente"] ?></p><a href="opdracht-session2.php?wijzig=5">wijzig</a></li>
        <li><p>postcode: <?php echo $_SESSION["postcode"] ?></p><a href="opdracht-session2.php?wijzig=6">wijzig</a></li>
    </ul>
</body>
</html>