<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Session Id</title>
</head>

<body>
Old Session Id: 
<?php
	session_start ();
	echo session_id();
	echo "<br>New Session Id";
	session_regenerate_id() ;
	echo session_id();
?>
 
</body>
</html>
