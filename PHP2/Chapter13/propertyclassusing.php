<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
</head>
<body>
<?php
   require("propertyclass.php");
   $phpClass = new PHPClass;
   $phpClass->ShowValue();
   $phpClass->attribute="PHP and MySQL";
   echo "<br>";
   echo $phpClass->attribute;
   echo "<br>";
   $phpClass->ShowValue();
?>
</body>
</html>