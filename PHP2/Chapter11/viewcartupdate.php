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
  <table width="1000" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3" valign="top"><?php require("top.php");?></td>
    </tr>
    <tr>
      <td width="200"  valign="top"><?php require("left.php");?></td>
      <td width="548"  valign="top" align="center">
        <br>
      	GIỎ HÀNG
        <form name="cart" method="post" action="viewcart.php">
       <table border="1" width="96%" cellspacing="1" cellpadding="1">
    	<tr><td>Mã</td><td>Tên</td><td>Số lượng</td>
        <td>Giá</td><td>Thành tiền</td></tr>
      <?php
	  session_start (); 
		if(isset($_SESSION["Cart"]))
		{
			$shop=$_SESSION["Cart"];
			//Update
			if(isset($_POST["update"]))
			{
				
				$qttycollection = $_POST["qtty"];
				for($i=0; $i<count($qttycollection); $i++)
				{
					$shop[$i]["Quantity"] = $qttycollection[$i];
					$shop[$i]["Amount"] = $shop[$i]["Quantity"]*$shop[$i]["Price"];
					 
				}
				$_SESSION["Cart"] = $shop;
			}
			for ($row = 0; $row < count($shop); $row++)
			{
				echo "<tr><td>";
				echo $shop[$row]["Id"]."</td>";
				echo "<td>".$shop[$row]["Title"]."</td>";
				echo "<td><input  id='qtty' name='qtty[]'";
				echo " value=".$shop[$row]["Quantity"] ;
				echo " size=3></td>";
				echo "<td>".$shop[$row]["Price"]."</td>";
				echo "<td>".$shop[$row]["Amount"]."</td>";
				echo "</tr>";
        	}
		}
	  ?>
      <tr><td colspan="5">
       <input name="update" type="submit" value="Cập nhật">
      
      </td></tr>
      </table></form>
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
 