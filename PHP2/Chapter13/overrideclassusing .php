<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
</head>
<body>
<?php
   require("baseclass.php");
   require("overrideclass.php");
   $phpClass = new DerivedClass();
   echo "<br>";
   $phpClass->ShowValue();
  echo "<br>";
 //  $phpClass->parent::ShowValue();
?>
</body>
</html>