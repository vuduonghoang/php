<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Session</title>
</head>

<body>
Update Session: 
<?php
	session_start (); 
	$_SESSION["fullname"] = "PHP and MySQL";
	echo $_SESSION["fullname"];
?>
<br />
<a href="getsession.php" target="_parent">Get Session</a>
</body>
</html>
