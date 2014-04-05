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
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
    	<tr>
               <!--begin body-->
	<?php
	require("connection.ini");
	$select = "select * from Items";
	$result = mysql_query($select, $connect);
	$rows = mysql_num_rows($result);
	
	$i=0;
	while($row = mysql_fetch_array($result))
	 {
		if($i==0)
		{
			echo "<td valign=top width='50%' >";
			echo "<table width='100%' border='0'";
			echo " cellspacing='2' cellpadding='2'>";
		}
		if( int_divide($rows,2)==$i)
		{
			echo "</table></td>";
			echo "<td  valign=top width='50%' >";
			echo "<table width='100%' border='0' ";
			echo "cellspacing='2' cellpadding='2'>";
		}
		echo "<tr><td rowspan=4 valign='top'>";
		echo "<img width=80px height=100px src='books/";
		echo $row["ItemId"].".jpg'></td>";
		echo "<td valign='top'><a href='details.php?id=";
		echo $row["ItemId"]. "'>";
		echo $row["ItemName"] ; 
		echo "</a></td></tr>";
		echo "<tr><td valign='top'>Price: ";
		echo $row["Price"] . "</td></tr>";
		echo "<tr><td valign='top'>Size: ";
		echo $row["Size"] . "</td></tr>";
		echo "<tr><td valign='top'>Weight: ";
		echo $row["Weight"] . "</td></tr>";
		$i++;
	}  
	echo "</table></td></tr><tr><td valign='top'><b>";
	echo "No of Records: ".$rows."</b></td></tr>";	
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

<?php
function int_divide($x, $y) {
    if ($x == 0) return 0;
    if ($y == 0) return FALSE;
    $result = $x/$y;
    $pos = strpos($result, '.');
    if (!$pos) {
        return $result;
    } else {
        return (int) substr($result, 0, $pos);
    }
} 
?>