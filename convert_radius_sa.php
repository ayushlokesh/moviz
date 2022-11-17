<!DOCTYPE html>
<html>
 <head>
 <title>Surface Area Calculator Page</title>
 </head>
 <body>
 <h1>Surface Area Calculator Page</h1>
 <?php
$c = $_GET['radius'];
$a = ($c * $c * 22/7 * 4);
echo ("Surface Area of the circle is =  " . $a);
 ?>

 </body>
</html>