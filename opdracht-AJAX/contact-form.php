<?php
	session_start();

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
	<h1>Contacteer ons</h1>
	<?= (isset($_SESSION['notification']) ? $_SESSION['notification'] : "") ?>
	<form action="contact.php" method="POST" id="form">
		<ul>
			<li>
				<label for="email">E-mail</label>
				<input type="email" name="email" value="<?php echo (isset($_SESSION['email']) ? $_SESSION['email'] : "") ?>">
			</li>
			<li>
				<label for="msg">Boodschap</label>
				<textarea name="msg" id="msg" cols="30" rows="10" value="<?php echo (isset($_SESSION['msg']) ? $_SESSION['msg'] : "") ?>"></textarea>
			</li>
			<li>
			<input type="checkbox" name="copy" id="copy">
			<label for="copy">Stuur een kopie naar mezelf</label>
			</li>
		</ul>
		<input type="submit" name="submit" value="Verzenden">
	</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		$( document ).ready(function() {
		    $('#form').submit(function(){
		    	var info = $("#form").serialize();

		    	$.ajax({
		    		type: 'POST',
					url: 'contact-API.php',
					data: info,
					success: function(data) {
						
						data = JSON.parse(data);
                        
                        if(data["type"] == "success") {
                            
                            $("#form").fadeOut(500, function(){
                                $(".form_location").append("<p>Bedankt! Uw bericht is goed verzonden!</p>").hide().fadeIn(500);
                            });
                        }
                        if(data["type"] == "error") {
                            $(".err").html("");
                            $(".form_location").prepend("<p class='err'>Oeps, er ging iets mis. Probeer opnieuw!</p>").hide().fadeIn(500);
                        }
                        
                      }
						}
				});
			});
		});
	</script>
</body>
</html>