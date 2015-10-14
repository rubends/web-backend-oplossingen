<?php
    $time = mktime(22, 35, 25, 01, 21, 1904);
    $date = date("d F Y, g:i:s", $time);

    setlocale(LC_ALL, 'nld_nld');
    $nl =  strftime("%d %B %Y, %I:%M:%S", $time);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>opdracht date</title>
</head>
<body>
    <h1>opdracht date</h1>
    <h2>deel 1</h2>
    <p><?php echo $date ?> pm</p>
    <h2>deel 2</h2>
    <p>naar het nederlands: <?php echo $nl ?> pm</p>
</body>
</html>