<?php

    $valid = FALSE;
    $message = "";   
    $error = "";
    try
    {
        if( isset($_POST["submit"]))
           {
               if (isset($_POST["code"]))
                   {
                       if(strlen($_POST["code"])==8)
                       {
                           $valid = TRUE;
                           $message = "korting toegekend";
                       }
                       else
                       {
                           throw new Exception("VALIDATION-CODE-LENGTH");
                       }
                   }
                else
                   {
                       throw new Exception("SUBMIT-ERROR");
                   }
           }
    }
    catch (Exception $e)
    {
        $error = $e->getMessage();
        
        switch($error)
        {
            case "VALIDATION-CODE-LENGTH":
                $message = "De kortingscode heeft niet de juiste lengte";
                break;
            case "SUBMIT-ERROR":
                $message = "Er werd met het formulier geknoeid";
                break;
            default:
                $message = "";
                break;
        }
        logToFile($message);
    }

    function logToFile($message)
    {
        
        $logFile = "errors.txt";
        $errorLog = file_get_contents($logFile);
        
        $datum = date('l jS \of F Y h:i:s A');
        $ip = $_SERVER['REMOTE_ADDR'];
        $errorLog .= ($datum . " " . $ip . " " . $message . PHP_EOL); //"\n" werkt  niet --> opdracht beter lezen:  \n\r
        file_put_contents($logFile, $errorLog);
    }


    class CustomException extends \Exception
    {

    private $_options;

    public function __construct($message, 
                                $code = 0, 
                                Exception $previous = null, 
                                $options = array('params')) 
    {
        parent::__construct($message, $code, $previous);

        $this->_options = $options; 
    }

    public function GetOptions() { return $this->_options; }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error Handling</title>
</head>
<body>
    <h1>Geef uw code</h1>
    <h2><?php echo $message ?></h2>
    <? if (!$valid): ?>
    <form action="opdracht-error-handling.php" method="POST">
      <label for="code">Kortingscode:</label>
      <input type="text" name="code" id="code"><br>
      <input type="submit" name="submit" value="Verzenden">
    </form>
    <? endif; ?>
</body>
</html>