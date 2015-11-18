<?php
	$message = "Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?";
	$nogtodo = "";
	$donedone = "";

	if (isset($_COOKIE["todo"])) 
		{ 
			$todolist = $_COOKIE["todo"] . "-";
		} 
	else
		{
			$todolist = "";
		}

	if( isset($_POST["submit"]))
	{
		if (isset($_POST["todo"]) && $_POST["todo"] != "" )
        {
        	$todolist .= $_POST["todo"];
            setcookie('todo', $todolist, time()+2592000); 
        }
	}

	$todos = explode("-", $todolist);

	if (!empty($todos))
	{
		$nogtodo = "Nog te doen:";
		$donedone = "Done and Done";
	}

	if(isset($_POST["done"]))
	{
	for($i=0; $i< count($todos); $i++)
	{
		if($_POST["done"] == $todos[$i])
		{
			unset($todos[$i]);
			setcookie('todo', $todolist, time()-3600);
			setcookie('todo', $todolist, time()+2592000); 
		}
	}
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
        <link rel="stylesheet" href="">
    </head>
    <body>

    	<h1>To Do</h1>
		<form action="index.php" method="POST">
    	<h2><?php echo $nogtodo ?></h2>

    	<ul>
    		<?php foreach($todos as $t){ ?>
    			<li>
					<input type="checkbox" name="done" value="<?php echo $t ?>"><?php echo $t; ?>
    			</li>
    		<?php } ?>
    	</ul>

    	<h2><?php echo $donedone ?></h2>

		<p><?php echo $message ?></p>
		
		<h1>Todo toevoegen</h1>

		
			<label for="todo">Beschrijving: </label>
			<input type="text" id="todo" name="todo">
			<input type="submit" name="submit" value="Toevoegen">
		</form>
    
</body></html>