<?php
  session_start();

  $message = "";
  $donedone = "";
  $werkwinkel = "";
  
  //DEZE KEER MET SESSION IPV COOKIES, NEEMT ARRAY!!!

  if(isset($_POST["submit"]))
  {
    if(!empty($_POST["todo"]))
    {
    $_SESSION["todolist"][] = $_POST["todo"]; 
    }
  }

  if(isset($_POST["done"]))
  {
    $_SESSION["donelist"][] = $_SESSION["todolist"][$_POST["done"]]; 
    unset($_SESSION["todolist"][$_POST["done"]]); 
  }

  if(isset($_POST["deletedone"]))
  {
    unset($_SESSION["donelist"][$_POST["deletedone"]]);
  }

  if(isset($_POST["notdone"]))
  {
    $_SESSION["todolist"][] = $_SESSION["donelist"][$_POST["notdone"]];
    unset($_SESSION["donelist"][$_POST["notdone"]]);
  }
  
  if(isset($_POST["delete"]))
  {
    unset($_SESSION["todolist"][$_POST["delete"]]);
  }

  if(empty($_SESSION["todolist"]) && empty($_SESSION["donelist"]))
  {
    $message = "Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?";
  }
  if(empty($_SESSION["todolist"]) && !empty($_SESSION["donelist"]))
  {
    $message = "Schouderklopje, alles is gedaan!";
  }
  if(!empty($_SESSION["todolist"]))
  {
    $message = "<h2>Nog te doen</h2>";
  }
  if(!empty($_SESSION["todolist"]) || !empty($_SESSION["donelist"])) 
  { 
     $donedone = "Done and done!";
  }
  if(empty($_SESSION["donelist"]) && !empty($_SESSION["todolist"]))
  {
     $werkwinkel = "Werk aan de winkel...";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="To Do" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>To Do</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <h1>Todo app</h1>

    <?php echo $message ?>

    <ul>
      <?php if(!empty($_SESSION["todolist"])){foreach($_SESSION["todolist"] as $todos => $t){?>
        <li>
          <form action="todo.php" method="POST">
            <button type="submit" value ="<?php echo $todos ?>" class="done" name="done"></button>
            <?php echo $t ?>
            <button type="submit" value ="<?php echo $todos ?>" class="del" name="delete">X</button>
          </form>
        </li>
      <?php }}  ?>
    </ul>

    <h2><?php echo $donedone ?></h2>

    <?php echo $werkwinkel ?>
    
    <ul>
      <?php if(!empty($_SESSION["donelist"])){foreach($_SESSION["donelist"] as $dones => $d){?>
        <li>
          <form action="todo.php" method="POST">
            <button type="submit" value ="<?php echo $dones ?>" class="done check" name="notdone"></button>
            <?php echo $d ?>
            <button type="submit" value ="<?php echo $dones ?>" class="del" name="deletedone">X</button>
          </form>
        </li>
      <?php }}  ?>
    </ul>

    <h1>Todo toevoegen</h1>
    <form action="todo.php" method="POST">
      <label for="todo">Beschrijving: </label>
      <input type="text" id="todo" name="todo">
      <input type="submit" name="submit" value="Toevoegen">
    </form>
  </body>
</html>