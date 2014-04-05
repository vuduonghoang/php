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
	 	$result =  null;
		$itemid = $_GET["id"];
		$whereclause= "";
		if($itemid !="")
			$whereclause= " where ItemId='".$itemid."' ";
		$sql = "select ItemId, ISBN, ItemName, Price, Description";
		$sql.=" from Items ". $whereclause;
		require("ZendProvider.php");
		$zendProvider = new ZendProvider();
		try {  
			 
		  $result = $zendProvider->FetchRows($sql);
		   
		} 
		catch(Exception $e) 
		{
		  die ('ERROR: ' . $e->getMessage());
		}
	 
	echo "<tr><td valign='top' colspan=3><b>";
	echo "Details</b><hr></td></tr>";	
	if($result!=null)
	 {
		 echo "<tr><td valign='top' rowspan=4>";
		 echo "<img border=0 src=books/";
		 echo $result[0][0]. ".jpg></td>";
		 echo "<td valign='top'>Book Id:</td>";
		 echo "<td valign='top'>";
		 echo $result[0][0]. "</td></tr>";
		 echo "<tr><td valign='top'>ISBN:</td>";
		 echo "<td valign='top'>";
		 echo $result[0][1]. "</td></tr>";
		 echo "<tr><td valign='top' nowrap>Book Name:</td>";
		 echo "<td valign='top'>";
		 echo $result[0][2] . "</td></tr>";
		 echo "<tr><td valign='top'>Unit Price:</td>";
		 echo "<td valign='top'>";
		 echo $result[0][3] . "</td></tr>";
		
		echo "<form name=cart action=addcart.php method=post>";
		echo "<tr><td valign='top' colspan=3>";
		echo "<input name=quantity value=1 size=5>";
		echo "<input value='Add to Cart' type=submit>";
		echo "<input name=itemid value='";
		echo $result[0][0]."' type='hidden'>";
		echo "<input name=itemname value='";
		echo $result[0][2]."' type=hidden>";
		echo "<input name=price value='";
		echo $result[0][3]."' type=hidden>";
		echo "<br><br></td></tr>";
		 echo "</form>";
		 
		 echo "<tr><td valign='top'>Description:</td>";
		 echo "<td valign='top' colspan=3>";
		 echo $result[0][4] . "</td></tr>";
	  }
	 
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
