<!DOCTYPE html>
<html>
 <head>
 <title>Getting Your Age Page</title>
 </head>
 <body>
 <h1>Getting Your Age Page</h1>
 <p>Please enter Your Age: </p>
 <form action="">
 <input type="text" name="age" id="age" />
 <p>Click to Know Your Status--->
 <input type="submit" value="Convert" /></p>
 </form>
 <?php
$c = ($_GET['age']);
$res=($c<18)?0:1;
echo ('Your Status is  "' . $res . '"');
 ?>
 </body>
</html>
