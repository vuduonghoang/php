<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
</head>
<body>
<?php
   require("parameterclass.php");
   $msg="Hello PHP OOP Programming";
   $phpClass = new PHPClass;
   $phpClass->HelloWorld( $msg);
   echo "<br>";
   $phpClass->HelloWorld("Goodbye PHP OOP Programming");
?>
</body>
</html>