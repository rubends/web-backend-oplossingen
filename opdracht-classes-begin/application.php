<?php 

    $new = 150;
    $unit = 100;
    
    function __autoload($class){
        include "classes/" .$class . "-class.php";   
    }
    $percent = new Percent($new, $unit);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classes begin</title>
</head>
<body>
   <p>Hoeveel procent is <?php echo $new ?> van <?php echo $unit ?>?</p>
    <table>
       <tr>
            <td>absoluut</td>
            <td><?php echo $percent->absolute ?></td>
       </tr>
       <tr>
           <td>relatief</td>
           <td><?php echo $percent->relative ?></td>
       </tr>
       <tr>
            <td>geheel getal</td>
            <td><?php echo $percent->hundred ?></td>
       </tr>
       <tr>
           <td>nominaal</td>
           <td><?php echo $percent->nominal ?></td>
       </tr>
    </table>
</body>
</html>