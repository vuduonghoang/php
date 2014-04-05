<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Get Session</title>
</head>

<body>
GET Session: 
<?php
	session_start (); 
	echo $_SESSION["fullname"];
?>
<br />
<a href="updatesession.php" target="_parent">Update Session</a> <a href="removesession.php" target="_parent">Remove Session</a>
</body>
</html>
