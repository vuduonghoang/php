<?php
	session_start (); 
	if(!isset($_SESSION["UserId"]))
		header("Location:login.php");
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
-->
</style>
<script language=JavaScript src="common.js"></script>
<script language=JavaScript>
 function CheckInput()
	   {
	  	
		 
		if (document.formregister.fullname.value=="")
		{
			alert("Please enter your Full name");
			document.formregister.fullname.focus();
			return false;
		}
		
		var isOK=false;
		for(var i=0;i<document.formregister.gender.length;i++)
		{
			if (formregister.gender[i].checked==true)
				{
					isOK=true;
					break;
				}
		}
		if (isOK==false)
		{
			alert("Please choose your gender");			
			return false;
		}
		
	   	if (document.formregister.football.checked==false && document.formregister.pingpong.checked==false && document.formregister.golf.checked==false && document.formregister.tenis.checked==false)
		{
			alert("Please choose at least one hobby");			
			return false;
		}	
		if (document.formregister.province.value=="")
		{
			alert("Please choose your Province");
			document.formregister.province.focus();
			return false;
		}			
		return true;

	  }       	  		
	
</script>  
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
      <form action="registeraccount.php" method="post" name="formedit" onSubmit="return CheckInput();">
        <table width="100%" border="0" cellspacing="4" cellpadding="4">
          <tr>
            <td colspan="2">
         	 Thông tin cá nhân trên MarketoHome.com</td>
          </tr>
         <?php
             require("common.php");
            $select = "select * from Customers where UserId='" .$_SESSION["UserId"]."'";
            require("/classes/MySQLProvider.php");
            $mySQLProvider = new MySQLProvider(); 
            $result = $mySQLProvider->GetResultSet($select);
			while($row = mysql_fetch_array($result))
            {
				$fullname = $row["Name"];
				$address = $row["Address"];
				$phone = $row["Phone"];
				$mobile = $row["Mobile"];
				$province = $row["ProvinceId"];
				$gender = $row["Gender"];
				$hobby = $row["Hobby"];
			}
          ?>
          <tr>
            <td colspan="2"><strong>Thông tin cá nhân</strong></td>
          </tr>
          <tr>
            <td>Họ và tên: &nbsp;</td>
            <td><input name="fullname" type="text" 
            id="fullname" size="50" maxlength="50" value="<?php echo $fullname?>">
              &nbsp;</td>
          </tr>
          
          <tr>
            <td>Địa chỉ: &nbsp;</td>
            <td><input name="address" type="text"
            id="address" size="50" maxlength="100"  
            value="<?php echo $address?>">
              &nbsp;</td>
          </tr>
          <tr>
            <td>Tỉnh thành: &nbsp;</td>
            <td><select name="province" id="province">
            <?php
            
            $select = "select * from Provinces";
            
            $result = $mySQLProvider->GetResultSet($select);
             $mySQLProvider->CloseConnection();
             
            echo "<option value=''>Chọn tỉnh thành</option>";
            while($row = mysql_fetch_array($result))
             {
                echo "<option value=";
                echo $row["ProvinceId"] ;
                echo ">". $row["ProvinceName"] . "</option>";
            }  
            ?>
              </select></td>
          </tr>
          <script language="javascript">
			for(var i=0; i<document.formedit.province.length; i++)
			{
				if(document.formedit.province[i].value=="<?php echo $province?>")
					document.formedit.province[i].selected = true;
			}
          </script>
          <tr>
            <td>Điện thoại &nbsp;</td>
            <td><input name="phone" type="text" 
            id="phone" maxlength="20"
             value="<?php echo $phone?>">
              &nbsp;</td>
          </tr>
          <tr>
            <td>Di Động &nbsp;</td>
            <td><input name="mobile" type="text"
             id="mobile" maxlength="20"
              value="<?php echo $mobile?>">
              &nbsp;</td>
          </tr>
           <tr>
            <td>Giới tính</td>
            <td> 
              <input type="radio" name="radio" id="gender" value="0">
              Nam 
              <input type="radio" name="radio" id="gender" value="1"> 
              Nữ
			</td>
          </tr>
          <script language="javascript">
			for(var i=0; i<document.formedit.gender.length; i++)
			{
				if(document.formedit.gender[i].value=="<?php echo $gender?>")
					document.formedit.gender[i].checked = true;
			}
          </script>
          <tr>
            <td>Sở thích</td>
            <td> 
              <input type="checkbox" name="hobby[]" id="hobby" value="<?php echo (indexof($hobby,"Football")=="1"?" checked":"")?>">
              Bóng đá
              <input type="checkbox" name="hobby[]" id="hobby"  value="Pingpong">
              Bóng bàn
              <input type="checkbox" name="hobby[]" id="hobby"  value="Golf">
              Golf
              <input type="checkbox" name="hobby[]" id="hobby"  value="Tenis">
              Tenis </td>
          </tr>
          <tr>
	<script language="javascript">
			for(var i=0; i<document.formedit.hobby.length; i++)
			{
				if("<?php echo $hobby?>".indexOf(document.formedit.hobby[i].value)!=-1)
					document.formedit.hobby[i].checked = true;
			}
          </script>
            <td>&nbsp;</td>
            <td><input type=submit value="Cập nhật tài khoản">
              <input type="reset" value="Huỷ"></td>
          </tr>
        </table> 
      </form>
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
