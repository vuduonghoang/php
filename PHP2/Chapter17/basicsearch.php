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
	    <h1 class="style2">Tìm kiếm cơ bản</h1>
      
       <br>
        <form name="searchform" method="post" action="result.php">
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
        
        <tr>
          <td width="13%" nowrap>Từ khoá</td>
          <td width="27%"><label>
            <input name="keyword" type="text" id="keyword" size="20">
          </label></td>
          <td width="15%" nowrap>Loại sách</td>
          <td width="24%"><label>
            <select name="category" id="category">
            <?php
			 
			$select = "select CategoryId, CategoryName from Categories";
			require("ZendProvider.php");
			$zendProvider = new ZendProvider();
			$result = $zendProvider->FetchObjects($select);
			 
			 
			echo "<option value=''>Chọn loại sách</option>";
			foreach($result as $key => $value)
			 {
				echo "<option value=".$key;
				echo ">". $value . "</option>";
			} 
			 
			?>
            </select>
            <input name="searchfrom" type="hidden" id="searchfrom" value="basic">
          </label></td>
          <td width="21%"><label>
            <input type="submit" name="search" id="search" value="Tìm kiếm">
          </label></td>
        </tr>
        <tr>
          <td>Tác giả</td>
          <td><select name="author" id="author">
            <?php
			 
			$select = "select AuthorId, AuthorName from Authors";
			 $result = $zendProvider->FetchObjects($select);
			 
			 
			echo "<option value=''>Chọn tác giả</option>";
			foreach($result as $key => $value)
			 {
				echo "<option value=".$key;
				echo ">". $value . "</option>";
			} 
			 
			?>
                    </select></td>
          <td>Nhà XB</td>
          <td><select name="publisher" id="publisher">
            
            <?php
			 
			$select = "select PublisherId, PublisherName from Publishers";
			 $result = $zendProvider->FetchObjects($select);
			 
			 
			echo "<option value=''>Chọn nhà xuất bản</option>";
			foreach($result as $key => $value)
			 {
				echo "<option value=".$key;
				echo ">". $value . "</option>";
			} 
			 
			?>
                    </select></td>
          <td><a href="advancedsearch.php">Advanced Search</a></td>
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
