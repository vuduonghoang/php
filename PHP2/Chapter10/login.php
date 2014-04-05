<?php
session_start (); 
//if the user has logged
if (isset($_SESSION["UserId"]))
	header("Location:myaccount.php");

//back from loginauthentication.php
$message = "Please enter your username and password.";
if(isset($_SESSION["Wrong"]))
{
	$sai = $_SESSION["Wrong"];
	if ($sai =="1")
		$message  = "<font color=red>User name is not existing, pelase enter ...</font>";
	if ($sai =="2")
		$message  = "<font color=red>Wrong password, pelase enter ...</font>";
}
?>
<html>
	<head>
		<script>
			
		</script>
	</head>
	<body>
    	<form name="form1" method="post" action="login-authentication.php">
    	<table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td colspan="2"><?php echo $message?></td>
             
          </tr>
          <tr>
            <td>User name: &nbsp;</td>
            <td><input type="text" name="username" id="username">&nbsp;</td>
          </tr>
          <tr>
            <td>Password: &nbsp;</td>
            <td><input type="password" name="password" id="password">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type=submit value="OK">&nbsp;&nbsp; <input type="reset" value="Reset"></td>
          </tr>
        </table>
		</form>
	</body>
</html>