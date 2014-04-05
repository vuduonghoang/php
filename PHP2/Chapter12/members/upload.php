<?php
session_start (); 
if (!isset($_SESSION["MemberId"]))
	header("Location:login.php");
$itemid="";
if(isset($_GET["itemid"]))
{
	$itemid = $_GET["itemid"];
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
	    <h3 >Cập nhật hình sản phẩm</h3>
       
		<form name="form1" method="post" action="fileupload.php?itemid=<?php echo $itemid?>" enctype="multipart/form-data">
			Tên tập tin hình ảnh: <input type="file" name="filename" id="filename" size=50><br><Br>
            Chỉ cho phép tải hình ảnh dạng .jpg với dung lượng <=1MB.<br>
			 <br>
		<input type=submit value="Upload"> &nbsp; <input type="reset" value="Reset">

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