<?php



	// MET COOKIES GEPROBEERD ===> GEEN SLIM PLAN








	$message = "Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?";
	$nogtodo = "";
	$donedone = "";
	$todos = [];
	$dones = [];

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

        $todos = explode("-", $todolist);
		if (!empty($todos))
		{
			$nogtodo = "Nog te doen:";
			$donedone = "Done and Done";
			$message = "werk aan de winkel ...";
		}
	}

	if (isset($_COOKIE["done"])) 
		{ 
			$donelist = $_COOKIE["done"] . "-";
		} 
	else
		{
			$donelist = "";
		}

	if( isset($_POST["submit"]))
	{
		if (isset($_POST["done"]) && $_POST["done"] != "" )
        {
        	$donelist .= $_POST["done"];
            setcookie('done', $donelist, time()+2592000); 
        }

        $dones = explode("-", $donelist);
		if (!empty($todos))
		{
			$nogtodo = "Nog te doen:";
			$donedone = "Done and Done";
			$message = "";
		}
	}
	
	/*for($i=0; $i < count($todos); $i++)
	{
		$btnname = "done" . $todos[$i];
		var_dump($btnname);
		if( isset($_POST[$btnname]))
		{
			unset($todos[$i]);
			$todoslist = str_replace($todos[$i], "", $todolist);
			$todos = explode("-", $todolist);
			setcookie('todo', $todolist, time()+2592000); 
			if (!empty($todos))
			{
				$nogtodo = "Nog te doen:";
				$donedone = "Done and Done";
				$message = "werk aan de winkel ...";
			}

		}
		if( isset($_POST["del"]))
		{

		}
	}*/
	var_dump($todolist);
	var_dump($todos);
	var_dump($donelist);
	var_dump($dones);

	

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

    	<h1>To Do</h1>
		
    	<h2><?php echo $nogtodo ?></h2>

    	<ul>
    		<?php foreach($todos as $t){ ?>
    			<li>
    				<form action="indexfail.php" method="POST">
					<input type="submit" name="done" value="" class="done">
					<?php echo $t; ?>
					<input type="submit" name="del<?php echo $t; ?>" value="X" class="del">
					</form>
    			</li>
    		<?php } ?>
    	</ul>

    	<h2><?php echo $donedone ?></h2>

		<p><?php echo $message ?></p>
		
		<h1>Todo toevoegen</h1>
		<form action="indexfail.php" method="POST">
		
			<label for="todo">Beschrijving: </label>
			<input type="text" id="todo" name="todo">
			<input type="submit" name="submit" value="Toevoegen">
		</form>
    
</body></html>