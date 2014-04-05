<?php
	session_start (); 
	if(isset($_SESSION["UserId"]))
		header("Location:myaccount.php");
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
	  	
		if (document.formregister.username.value=="")
		{
			alert("Invalid Email, Please enter Email");
			document.formregister.username.focus();
			return false;
		}
		if (document.formregister.username.value!="" 
		&& !IsEmail(document.formregister.username.value))
		{
			alert("Invalid Email, Please re-enter Email");
			document.formregister.username.focus();
			return false;
		}
		if (document.formregister.password.value=="")
		{
			alert("Please enter your own Password");
			document.formregister.password.focus();
			return false;
		}
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
      <form action="registeraccount.php" method="post" name="formregister" onSubmit="return CheckInput();">
        <table width="100%" border="0" cellspacing="4" cellpadding="4">
          <tr>
            <td colspan="2">
         	 Nếu bạn chưa có tài khoản MarketoHome.com</td>
          </tr>
            
          <tr>
            <td colspan="2"><strong>Thông tin đăng nhập</strong></td>
          </tr>
          <tr>
            <td>Email: &nbsp;</td>
            <td><input name="username" type="text" id="username" maxlength="50">
              &nbsp;</td>
          </tr>
          <tr>
            <td>Mật khẩu: &nbsp;</td>
            <td><input name="password" type="password" id="password" maxlength="10">
              &nbsp;</td>
          </tr>
         
          <tr>
            <td colspan="2"><strong>Thông tin cá nhân</strong></td>
          </tr>
          <tr>
            <td>Họ và tên: &nbsp;</td>
            <td><input name="fullname" type="text" 
            id="fullname" size="50" maxlength="50">
              &nbsp;</td>
          </tr>
          <tr>
            <td>Giới tính</td>
            <td><label>
              <input type="radio" name="radio" id="gender" value="0">
              Nam 
              <input type="radio" name="radio" id="gender" value="1"> 
              Nữ
</label></td>
          </tr>
          <tr>
            <td>Sở thích</td>
            <td><label>
              <input type="checkbox" name="hobby[]" id="hobby" value="Football">
              Bóng đá
              <input type="checkbox" name="hobby[]" id="hobby"  value="Pingpong">
              Bóng bàn
              <input type="checkbox" name="hobby[]" id="hobby"  value="Golf">
              Golf
              <input type="checkbox" name="hobby[]" id="hobby"  value="Tenis">
              Tenis</label></td>
          </tr>
          <tr>
            <td>Địa chỉ: &nbsp;</td>
            <td><input name="address" type="text"
            id="address" size="50" maxlength="100" >
              &nbsp;</td>
          </tr>
          <tr>
            <td>Tỉnh thành: &nbsp;</td>
            <td><select name="province" id="province">
            <?php
            
            $select = "select * from Provinces";
            require("/classes/MySQLProvider.php");
            $mySQLProvider = new MySQLProvider(); 
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
          <tr>
            <td>Điện thoại &nbsp;</td>
            <td><input name="phone" type="text" 
            id="phone" maxlength="20">
              &nbsp;</td>
          </tr>
          <tr>
            <td>Di Động &nbsp;</td>
            <td><input name="mobile" type="text"
             id="mobile" maxlength="20">
              &nbsp;</td>
          </tr>
           
          <tr>
            <td>&nbsp;</td>
            <td><input type=submit value="Tạo tài khoản">
              &nbsp;&nbsp;
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
