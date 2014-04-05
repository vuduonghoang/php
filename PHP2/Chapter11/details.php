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
      <table width="100%" border="0" cellspacing="3" cellpadding="3">
     <!--begin body-->
	<?php
	if(isset($_GET["id"]))
	{
	require("connection.ini");
	$itemid = $_GET["id"];
	$select = "select * from Items where ItemId='".$itemid . "'";
	$result = mysql_query($select, $connect);
	 
	echo "<tr><td valign='top' colspan=3><b>";
	echo "Details</b><hr></td></tr>";	
	if($row = mysql_fetch_array($result))
	 {
	 
	 echo "<tr><td valign='top' rowspan=4>";
	 echo "<img border=0 src=books/";
	 echo $row["ItemId"]. ".jpg></td>";
	 echo "<td valign='top'>Book Id:</td>";
	 echo "<td valign='top'>";
	 echo $row["ItemId"]. "</td></tr>";
	 echo "<tr><td valign='top'>ISBN:</td>";
	 echo "<td valign='top'>";
	 echo $row["ISBN"]. "</td></tr>";
	 echo "<tr><td valign='top' nowrap>Book Name:</td>";
	 echo "<td valign='top'>";
	 echo $row["ItemName"] . "</td></tr>";
	 echo "<tr><td valign='top'>Unit Price:</td>";
	 echo "<td valign='top'>";
	 echo $row["Price"] . "</td></tr>";
	
	echo "<form name=cart action=addcart.php method=post>";
	echo "<tr><td valign='top' colspan=3>";
	echo "<input name=quantity value=1 size=5>";
	echo "<input value='Add to Cart' type=submit>";
	echo "<input name=itemid value='";
	echo $row["ItemId"]."' type='hidden'>";
	echo "<input name=itemname value='";
	echo $row["ItemName"]."' type=hidden>";
	echo "<input name=price value='";
	echo $row["Price"]."' type=hidden>";
	echo "<br><br></td></tr>";
	 echo "</form>";
	 
	 echo "<tr><td valign='top'>Description:</td>";
	 echo "<td valign='top' colspan=3>";
	 echo $row["Description"] . "</td></tr>";
	
	}  
	require("closeconnection.ini");
	}
	else
		echo "Book not found.";
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
