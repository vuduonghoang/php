<?php
$name  = "";
$password ="";
if(isset($_COOKIE["username"]))
{
	$name = $_COOKIE["username"]; 
	$password = $_COOKIE["password"]; 
}
?>
<html>
	<head>
		
	</head>
	<body>
		 
		<form name="form1" method="post" 
        action="loginauthentication.php">
        User name: <input type="text" name="username" 
        id="username" value ="<?php echo $name ?>"><br>
        Password: <input type="password" 
        name="password" id="password"  
        value ="<?php echo $password ?>"><br>
		<input type=submit value="OK"> 
		&nbsp; <input type="reset" value="Reset">

		</form>
	 
	</body>
</html>