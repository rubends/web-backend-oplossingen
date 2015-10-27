<?php 
    function __autoload($class)
	{
		include_once 'classes/' . $class . '.php'; 
	}
    
    $htmlBuilder = new HTMLbuilder('header-partial.php', 'index-partial.php', 'footer-partial.php');


?>