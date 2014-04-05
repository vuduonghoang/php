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
	    <h1 class="style2">Tìm kiếm nâng cao</h1>
      
        <br>
        <form name="searchform" method="post" action="result.php">
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
        
        <tr>
          <td width="16%">Từ khoá</td>
          <td width="27%"><label>
            <input type="text" name="keyword" id="keyword">
          </label></td>
          <td width="16%">Loại sách</td>
          <td width="28%"><label>
            <select name="category" id="category">
            <?php
			 
			$select = "select * from Categories";
			require("/classes/MySQLProvider.php");
			$mySQLProvider = new MySQLProvider();
			$result = $mySQLProvider->GetResultSet($select);
			 
			$rows = mysql_num_rows($result);
			echo "<option value=''>Chọn loại sách</option>";
			while($row = mysql_fetch_array($result))
			 {
				echo "<option value=";
				echo $row["CategoryId"] ;
				 
				echo ">". $row["CategoryName"] . "</option>";
			}  
			 
			?>
            </select>
            <input name="searchfrom" type="hidden" id="searchfrom" value="advanced">
          </label></td>
          </tr>
        <tr>
          <td>Giá từ</td>
          <td><input type="text" name="minprice" id="minprice"></td>
          <td>đến </td>
          <td><input type="text" name="maxprice" id="maxprice"></td>
          </tr>
        <tr>
          <td>Loại độc giả</td>
          <td><select name="readertype" id="readertype">
            <?php
			 
			$select = "select * from ReaderTypes";
			 
			 
			$result = $mySQLProvider->GetResultSet($select);
			 
			$rows = mysql_num_rows($result);
			echo "<option value=''>Chọn loại độc giả</option>";
			while($row = mysql_fetch_array($result))
			 {
				echo "<option value=";
				echo $row["ReaderTypeId"] ;
				 
				echo ">". $row["ReaderTypeName"] . "</option>";
			}  
			 
			?>
                    </select></td>
          <td>Ngôn ngữ</td>
          <td><select name="language" id="language">
            <?php
			 
			$select = "select * from Languages";
			 
			$result = $mySQLProvider->GetResultSet($select);
			 
			$rows = mysql_num_rows($result);
			echo "<option value=''>Chọn ngôn ngữ</option>";
			while($row = mysql_fetch_array($result))
			 {
				echo "<option value=";
				echo $row["LanguageId"] ;
				 
				echo ">". $row["LanguageName"] . "</option>";
			}  
			 
			?>
                    </select></td>
          </tr>
        <tr>
          <td>Tác giả</td>
          <td><select name="author" id="author">
            <?php
			 
			$select = "select * from Authors";
			 
			$result = $mySQLProvider->GetResultSet($select);
			 
			$rows = mysql_num_rows($result);
			echo "<option value=''>Chọn tác giả</option>";
			while($row = mysql_fetch_array($result))
			 {
				echo "<option value=";
				echo $row["AuthorId"] ;
				 
				echo ">". $row["AuthorName"] . "</option>";
			}  
			 
			?>
          </select></td>
          <td>Nhà XB</td>
          <td><select name="publisher" id="publisher">
            <?php
			 
			$select = "select * from Publishers";
			  
			$result = $mySQLProvider->GetResultSet($select);
			$mySQLProvider->CloseConnection();
			$rows = mysql_num_rows($result);
			echo "<option value=''>Chọn nhà xuất bản</option>";
			while($row = mysql_fetch_array($result))
			 {
				echo "<option value=";
				echo $row["PublisherId"] ;
				 
				echo ">". $row["PublisherName"] . "</option>";
			}  
			 
			?>
          </select></td>
          </tr>
        <tr>
          <td height="39">&nbsp;</td>
          <td><input type="submit" name="search" id="search" value="Tìm kiếm"></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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
