﻿<html xmlns="http://www.w3.org/1999/xhtml">
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
      <td width="548"  valign="top" align="center">
	    <br>
	    <table width="90%" border="0" cellspacing="1" cellpadding="1">
         <tr><td><b>Danh sách sản phẩm</b></td></tr>
        <?php
			$select = "select CategoryId, CategoryName from Categories";
			require("ZendProvider.php"); 
			$zendProvider = new ZendProvider();
			$result = $zendProvider->FetchObjects($select);
			if($result!=null)
			{
				foreach($result as $key => $value)
				{
					echo "<tr><td><a href='list.php?categoryid=";
					echo $key;
					echo "'>".$value."</a>";
					echo "</td></tr>";
				}
				  				 
			}
			else
				echo "<tr><td>Không tìm thấy mẩu tin.</td></tr>";
			
		?> 
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
