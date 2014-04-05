<?php
session_start (); 
if (!isset($_SESSION["MemberId"]))
	header("Location:login.php");
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
	    <b>Đơn đặt hàng MarketoHome</b><br>
        <table width="100%" border="1" cellspacing="1" cellpadding="1">
      <tr>
        <td>Ngày</td>
        <td>Người nhận hàng</td>
        <td>Địa chỉ</td>
        <td>Điện thoại</td>
        <td>Di động</td>
        <td>Số tiền</td>
      </tr>
      
		<?php
		require("../connection.ini");
		$select = "select * from Orders where 1=1";
		 
		$result = mysql_query($select, $connect);
		$rows = mysql_num_rows($result);
		$totalamount=0;
		while($row = mysql_fetch_array($result))
		 {
		 ?>
         <tr>
        <td><?php echo $row["OrderDate"]?></td>
        <td><a href="orderdetails.php?orderid=<?php echo $row["OrderId"]?>">
		<?php echo $row["FullName"]?></a></td>
        <td><?php echo $row["Address"]?></td>
        <td><?php echo $row["Telephone"]?></td>
        <td><?php echo $row["Mobile"]?></td>
         <td><?php echo $row["Amount"]?></td>
      	</tr>
        <?php 
		$totalamount += $row["Amount"];
		}  
		require("../closeconnection.ini");
		
		?>
        <tr>
        <td colspan="3"><?php echo "<b>Tổng số hợp đồng: ".$rows."</b>";?></td>
        <td colspan="2">Tổng số tiền</td><td><?php echo "<b>".$totalamount."</b>";?></td></tr>
        </table>
        <!--end body--></td>
      <td width="242"  valign="top"><?php require("right.php");?></td>
    </tr>
    <tr>
      <td colspan="3"  valign="top"><?php include("bottom.htm");?></td>
    </tr>
  </table>
</div>
</body>
</html>
