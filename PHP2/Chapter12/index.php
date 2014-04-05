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
      <!--begin body-->
	<h1 class="style2">Welcome to MarketoHome.com.</h1>
      
       <br>
        <form name="searchform" method="post" action="result.php">
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr>
          <td width="13%">Từ khoá</td>
          <td width="30%"><label>
            <input type="text" name="keyword" id="keyword">
          </label></td>
          <td width="16%">Loại sách</td>
          <td width="28%"><label>
            <select name="category" id="category">
            <?php
			require("connection.ini");
			$select = "select * from Categories";
			$result = mysql_query($select, $connect);
			$rows = mysql_num_rows($result);
			echo "<option value=''>Chọn loại sách</option>";
			while($row = mysql_fetch_array($result))
			 {
				echo "<option value=";
				echo $row["CategoryId"] ;
				 
				echo ">". $row["CategoryName"] . "</option>";
			}  
			require("closeconnection.ini");
			?>
            </select>
            <input name="searchfrom" type="hidden" id="searchfrom" value="quick">
          </label></td>
          <td width="13%"><label>
            <input type="submit" name="search" id="search" value="Tìm kiếm">
          </label></td>
        </tr>
      </table>
      
      </form>
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
