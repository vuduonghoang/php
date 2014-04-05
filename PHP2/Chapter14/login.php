
<?php
session_start (); 
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
<style type="text/css">
<!--
a {
	color: #3399FF
}
.topmenu {
	font-family: Arial, Helvetica, sans-serif;
	font-style: normal;
	color: #FFFFFF;
}
.style1 {color: #CC6600}
.style2 {color: #0099FF}
-->
</style>
</head>

<body bottomMargin=0 leftMargin=0 topMargin=0 rightMargin=0>
<div align="center">
  <table width="1000" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3" valign="top"><?php require("top.php");?></td>
    </tr>
    <tr>
      <td width="200"  valign="top"><?php require("left.php");?></td>
      <td width="548"  valign="top">
      <!--begin body--><br>
	    <h3 >Đăng nhập MarketoHome</h3>
       
		<form name="form1" method="post" action="login-authentication.php">
    	<table width="100%" border="0" cellspacing="1" cellpadding="1">
          <tr>
            <td colspan="2"><?php echo $message?></td>
             
          </tr>
          <tr>
            <td>User name: &nbsp;</td>
            <td><input name="username" type="text" id="username" value="khang@yahoo.com">
            &nbsp;</td>
          </tr>
          <tr>
            <td>Password: &nbsp;</td>
            <td><input name="password" type="password" id="password" value="1234">
            &nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type=submit value="OK">&nbsp;&nbsp; <input type="reset" value="Reset"></td>
          </tr>
        </table>
		</form>
        </td>
      <td width="242"  valign="top"><?php require("right.php");?></td>
    </tr>
    <tr>
      <td colspan="3"  valign="top"><?php include("bottom.htm");?></td>
    </tr>
  </table>
</div>
</body>
</html>
