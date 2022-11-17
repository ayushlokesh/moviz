<!DOCTYPE html>
<html>
 <head>
 <title>Temperature Conversion Page</title>
 </head>
 <body>
 <h1>Temperature Conversion Page</h1>
 <?php
$c = $_GET['temp'];
$f = ($c * 9/5) + 32;
echo ($c . " degrees Celsius is " . $f . " degrees Fahrenheit");
 ?>

 </body>
</html>