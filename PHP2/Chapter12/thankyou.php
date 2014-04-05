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
	    <h3 >Thông báo MarketoHome</h3>
       <?php
	   if(isset($_GET["type"]))
	   {
       	$from = $_GET["type"];
		switch($from)
		{
			case "order":
			case "registerandorder":
			 ?>
			Cám ơn bạn đã sử dụng dịch vụ của MarketoHome.com, 
			<br>Xem đơn đặt hàng nhấn <a href ="myorders.php">Xem</a>
			<?php
			break;
			case "register":
			 ?>
			Cám ơn bạn đã sử dụng dịch vụ của MarketoHome.com, 
			<br>Xem thông tin tài khoản <a href ="myaccount.php">Xem</a>
			<?php
			break;
		}
	   }
		?>
        <br><br>nếu có nhu cầu đăng xuất thì nhấn <a href ="logout.php">Logout</a>
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
