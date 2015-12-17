<?php
	
	if (isset($_POST["submit"])) {
	
		$regEx = $_POST["regex"];
		$replaceString = "#";
		$searchString = $_POST["string"];
		$uitkomst = preg_replace($regEx, $replaceString, $searchString);
	}
	else
	{
		$uitkomst = "";
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form action="regex.php" method="POST">
	        <ul>
	            <li>
	                <label for="regex">Regular Expression</label>
	                <input type="text" name="regex" id="regex" value="<?php echo (isset($_POST['submit']) ? $_POST["regex"] : "") ?>">
	            </li>
	            <li>
	                <label for="string">String</label>                            
	                <textarea name="string" id="string" cols="30" rows="10"><?php echo (isset($_POST['submit']) ? $searchString : "") ?></textarea>
	            </li>
	        </ul>
	        <input type="submit" name="submit" value="RegEx it!">
        </form>
        <p><?php echo $uitkomst ?></p>

        <h1>Voorbeelden:</h1>
	        <table>
			  <tr>
			  	<th></th>
			    <th>Regex</th>
			    <th>SearchString</th>
			    <td>Uitkomst</td>
			  </tr>
			  <tr>
			  	<td>1</td>
			    <td>[A-DU-Za-du-z]</td>
			    <td> Memory can change the shape of a room; it can change the color of a car. And memories can be distorted. They're just an interpretation, they're not a record, and they're irrelevant if you have the facts.</td>
			    <td>Memor# ##n #h#nge the sh#pe of # room; it ##n #h#nge the #olor of # ##r. #n# memories ##n #e #istorte#. The#'re j#st #n interpret#tion, the#'re not # re#or#, #n# the#'re irrele##nt if #o# h##e the f##ts.</td>
			  </tr>
			  <tr>
			  	<td>2</td>
			    <td>colou?r</td>
			    <td> Memory can change the shape of a room; it can change the color of a car. And memories can be distorted. They're just an interpretation, they're not a record, and they're irrelevant if you have the facts.</td>
			    <td>Memor# ##n #h#nge the sh#pe of # room; it ##n #h#nge the #olor of # ##r. #n# memories ##n #e #istorte#. The#'re j#st #n interpret#tion, the#'re not # re#or#, #n# the#'re irrele##nt if #o# h##e the f##ts.</td>
			  </tr>
			  <tr>
			  	<td>3</td>
			    <td>?</td>
			    <td> 1020 1050 9784 1560 0231 1546 8745</td>
			    <td></td>
			  </tr>
			  <tr>
			  	<td>4</td>
			    <td>?</td>
			    <td>24/07/1978 en 24-07-1978 en 24.07.1978</td>
			    <td></td>
			  </tr>
			</table>
	</div>
</body>
</html>