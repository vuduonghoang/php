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
       <!--begin body-->
        <?php
			require("connection.ini");
			$id = "";
			$name ="";
			$group = "";
			if(isset($_GET["id"]))
			{
				$id = $_GET["id"];
				if(!is_int($id))
				{
					$select = "select * from Categories";
					$select.=" where CategoryId=".$id;
					$result = mysql_query($select, $connect);
					while($row = mysql_fetch_array($result))
					 {
						$name= $row["CategoryName"];
						$group= $row["GroupId"] ;
					}  
				}
			}
		?>
       <form name="form1" method="post" action="save.php">
        <p><strong> &nbsp;Category</strong></p>
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="105">Category Name</td>
            <td width="433"><label>
              <input name="categoryname" type="text" 
              value="<?php echo $name;?>" 
              id="categoryname" size="50" maxlength="50">
            </label></td>
          </tr>
          <tr>
            <td>Group Name</td>
            <td><select name='groupname' id='groupname'>
            <?php
			 
			$select = "select * from Groups";
			$result = mysql_query($select, $connect);
			$rows = mysql_num_rows($result);
			while($row = mysql_fetch_array($result))
			 {
				echo "<option value=";
				echo $row["GroupId"] ;
				if($group==$row["GroupId"])
					echo " selected";
				echo ">". $row["GroupName"] . "</option>";
			}  
			require("closeconnection.ini");
			?>
              
              </select>
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="button" id="button" value="Save">
              <input name="from" type="hidden" id="from" value="category">
              <input name="id" type="hidden" id="id" value="<?php echo $id?>">
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
      </form>
      <!--end body-->      </td>
      <td width="242"  valign="top"><?php require("right.php");?></td>
    </tr>
    <tr>
      <td colspan="3"  valign="top"><?php include("bottom.htm");?></td>
    </tr>
  </table>
</div>
</body>
</html>
