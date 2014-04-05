<?php
session_start (); 
if (!isset($_SESSION["MemberId"]))
	header("Location:login.php");
$itemid="";
$message= "";
if(isset($_GET["itemid"]))
{
	$itemid = $_GET["itemid"];
	if($_FILES["filename"]["error"] > 0)
	{
		 $message= "Error: ".$_FILES["filename"]["error"]."<br />";
	}
	else
	{	
		$fileType = $_FILES["filename"]["type"];
		 //$fileType =="image/gif")
		if($fileType =="image/pjpeg") 
		{
			$fileName =  $_FILES["filename"]["name"];
			$tempFileName = $_FILES["filename"]["tmp_name"];
			if ($_FILES["filename"]["size"] > 2*1024*1024)
				$message = "Dung lượng tập tin vượt quá 2MB.";
			else
			{
				$folder = "C:/wampserver/www/Chapter12/books/";
				$fileupload = $folder . $itemid.".";
				$fileupload .=file_extension($fileName);
				move_uploaded_file($tempFileName, $fileupload);
				
				//echo dirname($_SERVER['SCRIPT_FILENAME']);
			}
			
		}
		else
			$message= "Xin vui lòng upload tập tin .jpg.";
	}
	
	if( $message=="")
		header("Location:details.php?itemid=".$itemid);
}
else
{
	$message= "Xin vui lòng chọn sản phẩm.";
}
function file_extension($filename)
{
    $path_info = pathinfo($filename);
    return $path_info['extension'];
}

?>
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
       <br>
	    <h3 >Cập nhật hình sản phẩm</h3>
       
		<?php echo  $message;?>
		 
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