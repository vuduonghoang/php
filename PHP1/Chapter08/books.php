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
      <table width="100%" border="1" cellspacing="0" cellpadding="0">
    	<tr>
      	<td  valign="top" nowrap>Item Id</td>
	<td  valign="top">Item Name</td>
	<td  valign="top">Price</td>
    	</tr>
               <!--begin body-->
	<?php
	require("connection.ini");
	$select = "select * from Items";
	$result = mysql_query($select, $connect);
	$rows = mysql_num_rows($result);
	echo "<tr><td valign='top' colspan=3><b>";
	echo "No of Records: ".$rows."</b></td></tr>";	
	while($row = mysql_fetch_array($result))
	 {
		echo "<tr><td valign='top'>";
    		echo $row["ItemId"]. "</td>";
		echo "<td valign='top'>";
		echo "<a href='details.php?id=";
		echo $row["ItemId"]. "'>";
		echo $row["ItemName"] . "</td>";
		echo "</a>";
		echo "<td valign='top'>";
		echo $row["Price"] . "</td></tr>";
	}  
	require("closeconnection.ini");
	?>
          <!--end body-->
          </table>
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
