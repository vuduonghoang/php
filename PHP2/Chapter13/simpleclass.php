<?php
class PHPClass
{
    public $msg = "Hello PHP OOP";
    function HelloWorld() 
    {
        echo "Hello PHP OOP Programming";
    }
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
</head>
<body>
<?php
   $phpClass = new PHPClass();
   $phpClass->HelloWorld();
   echo "<br>";
   echo $phpClass->msg;
   $phpClass->msg="Good bye PHP OOP";
   echo "<br>";
   echo $phpClass->msg;
?>
</body>
</html>