<?php
session_start (); 
if (!isset($_SESSION["UserId"]))
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
	    <b>Đơn đặt hàng chi tiết MarketoHome</b><br>
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
		$orderid = $_GET["orderid"];
		require("connection.ini");
		$select = "select * from Orders where";
		$select.=" UserId='". $_SESSION["UserId"] ."'";
		$select.=" and OrderId ='" .$orderid. "'";
		$result = mysql_query($select, $connect);
		while($row = mysql_fetch_array($result))
		 {
		 ?>
         <tr>
        <td><?php echo $row["OrderDate"]?></td>
        <td><?php echo $row["FullName"]?></td>
        <td><?php echo $row["Address"]?></td>
        <td><?php echo $row["Telephone"]?></td>
        <td><?php echo $row["Mobile"]?></td>
         <td><?php echo $row["Amount"]?></td>
      	</tr>
        <?php 
		 
		}  
		 
		?>
        </table>
        <table width="100%" border="1" cellspacing="1" cellpadding="1">
      	
      <tr>
        <td>Số</td>
        <td>Sản phẩm</td>
         <td>Năm XB</td>
        <td>Số lượng</td>
        <td>Đơn giá</td>
        <td>Thành tiền</td>
      </tr>
      
		<?php
		 
		$select = "select * from Orders O, OrderDetails D, Items I";
		$select.="  where O.OrderId=D.OrderId and D.ItemId=I.ItemId ";
		$select.=" and UserId='". $_SESSION["UserId"] ."'";
		$select.=" and O.OrderId ='" .$orderid. "'";
		$result = mysql_query($select, $connect);
		$rows = mysql_num_rows($result);
		$totalamount=0;
		while($row = mysql_fetch_array($result))
		 {
		 ?>
         <tr>
        <td><?php echo $row["No"]?></td>
        <td><?php echo $row["ItemName"]?></td>
        <td><?php echo $row["PublishYear"]?></td>
        <td><?php echo $row["Qtty"]?></td>
        <td><?php echo $row["Price"]?></td>
        
         <td><?php echo $row["Amount"]?></td>
      	</tr>
        <?php 
		$totalamount += $row["Amount"];
		}  
		require("closeconnection.ini");
		
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
