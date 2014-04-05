<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
</head>
<body>
<?php
   require("variableclass.php");
   $phpClass = new PHPClass;
   $phpClass->HelloWorld();
   echo "<br>";
   echo $phpClass->msg;
   echo "<br>";
   $phpClass->msg="Goodbye PHP OOP Programming";
   echo $phpClass->msg;
   echo "<br>";
   $phpClass->HelloWorld();
?>
</body>
</html>