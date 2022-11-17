<!DOCTYPE html>
<html>
 <head>
 <title>Circumference and Area Calculator Page</title>
 </head>
 <body>
 <h1>Circumference and Area Calculator Page</h1>
 <?php
$c = $_GET['radius'];
$cr = ($c * 2 * 22/7);
$a = ($c * $c * 22/7);
echo ("Area of the circle is =  " . $a . ", and its Circumference is = " . $cr);
 ?>

 </body>
</html>