﻿<?php
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
		 
		$select = "select OrderId, OrderDate,";
		$select .= " FullName, Address,Telephone,";
		$select .= " Mobile, Amount  from Orders where";
		$select.=" UserId='". $_SESSION["UserId"] ."'";
		
		require("ZendProvider.php");
		$zendProvider = new ZendProvider();
		try {  
			 
		  $result = $zendProvider->FetchRows($select);
		   
		} 
		catch(Exception $e) 
		{
		  die ('ERROR: ' . $e->getMessage());
		}
		$rows = 0;
		$totalamount=0;
		foreach($result as $key => $row)
		 {
		 ?>
         <tr>
        <td><?php echo $row[1]?></td>
        <td><a href="myorderdetails.php?orderid=<?php echo $row[0]?>">
		<?php echo $row[2]?></a></td>
        <td><?php echo $row[3]?></td>
        <td><?php echo $row[4]?></td>
        <td><?php echo $row[5]?></td>
         <td><?php echo $row[6]?></td>
      	</tr>
        <?php 
		$rows++;
		$totalamount += $row[6];
		}  
		 
		
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
