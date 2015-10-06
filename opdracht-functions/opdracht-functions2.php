<?php
    $helden = array('elon musk', 'superman', 'batman', 'chuck testa');
    function drukArrayAf($array)
    {
        $helden = array();
        end($GLOBALS);
        $names = key ($GLOBALS);
        foreach($array as $key => $value)
        {
            $helden[] = $names . '[' . $key . '] heeft waarde ' . $value;
        }
        return $helden;
    }
    
    $hero = drukArrayAf($helden);
	
    $htmlString =   '<html><head><title>Dit is een test</title></head><body>Tekst</body></html>'; //van voorbeeld
    function validateHtmlTag($html) //moeilijk te snappen
    {
        $open = '<html>';
        $dicht = '</html>';
        $valid = FALSE;
        
        if(strpos($html, $open) == 0)
        {
            $closepos = strlen($html) - strlen($dicht);
            if (strpos($html,$dicht) == $closepos)
            {
                $valid = TRUE;
            }
        }
        return $valid;
    }
    
    $validHtml = validateHtmlTag($htmlString);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>functions</title>
</head>
<body>
   <h1>deel 2</h1>
    <ul>
    <?php foreach ( $hero as $value ): ?>
        <li><?= $value ?></li>
    <?php endforeach ?>
    
    <p><code><?= htmlentities($htmlString) ?></code> is <?= ($validHtml) ? 'wel' : 'niet' ?> geldig.</p>
    </ul>
</body>
</html>
</html>