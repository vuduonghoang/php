<?php
	session_start (); 
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
        <table width="100%" border="0" cellspacing="4" cellpadding="4">
        <?php
		require("/classes/MySQLProvider.php");
		$mySQLProvider = new MySQLProvider();
			 
		$name=""; $address=""; $phone=""; $mobile=""; $province="";
		if(!isset($_SESSION["UserId"]))
		{
 
		?>
          <tr>
            <td>Nếu bạn là thành viên của MarketoHome.com</td>
          </tr>
          <form action="login-authentication.php?from=cart" method="post" name="formlogin" target="_parent">
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tr>
                <td colspan="2"><strong>Đăng nhập</strong></td>
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
                <td>&nbsp;</td>
                <td><input type=submit value="Đăng nhập">
                  &nbsp;&nbsp;
                  <input type="reset" value="Huỷ"></td>
              </tr>
            </table></td>
          </tr></form>
          <?php
		  }
		  else
		  {
		  	   $select = "select * from Customers where UserId='".$_SESSION["UserId"]."'";
				 $result = $mySQLProvider->GetResultSet($select);
				 
				if($row = mysql_fetch_array($result))
				 {
				 	$name=$row["Name"] ;
					$address=$row["Address"] ;
					$phone=$row["Phone"] ;
					$mobile=$row["Mobile"] ;
					$province=$row["ProvinceId"] ;
				}  
		  }
		  ?>
          <tr>
            <td>
          <?php
		  if(!isset($_SESSION["UserId"])) echo "Nếu bạn chưa có tài khoản MarketoHome.com";
		  else echo "Thông tin cá nhân của người nhận hàng";
			?></td>
          </tr>
          
          <tr>
            <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
            <?php
			if(!isset($_SESSION["UserId"]))
			{
			?>
            <form action="register.php?from=cart" method="post" name="formregister" target="_parent">
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
				 
				$result = $mySQLProvider->GetResultSet($select);
				 
				 
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
               <?php
			  }
			  else
			  {
			  ?>
              <form action="order.php" method="post" name="formorder" target="_parent">
               <?php
			  }
			  ?>
              <tr>
                <td colspan="2"><strong>Thông tin nhận hàng</strong></td>
              </tr>
              <tr>
                <td>Họ và tên: &nbsp;</td>
                <td><input name="fullname1" type="text"
                 id="fullname1"  value="<?php echo $name?>" size="50" maxlength="50">
                  &nbsp;</td>
              </tr>
              <tr>
                <td>Địa chỉ: &nbsp;</td>
                <td><input name="address1" type="text" 
                id="address1"  value="<?php echo $address?>" size="50" maxlength="100">
                  &nbsp;</td>
              </tr>
              <tr>
                <td>Tỉnh thành: &nbsp;</td>
                <td><select name="province1" id="province1">
                <?php
				$select = "select * from Provinces";
				 
				$result = $mySQLProvider->GetResultSet($select);
				$mySQLProvider->CloseConnection();
				 
				echo "<option value=''>Chọn tỉnh thành</option>";
				while($row = mysql_fetch_array($result))
				 {
					echo "<option value=";
					echo $row["ProvinceId"] ;
					if($province==$row["ProvinceId"] ) echo " selected";
					echo ">". $row["ProvinceName"] . "</option>";
				} 
				 
				?>
                  </select></td>
              </tr>
              <tr>
                <td>Điện thoại &nbsp;</td>
                <td><input name="phone1" type="text"
                 id="phone1"  value="<?php echo $phone?>" size="20" maxlength="20">                  &nbsp;</td>
              </tr>
              <tr>
                <td>Di Động &nbsp;</td>
                <td><input name="mobile1" type="text" 
                id="mobile1"  value="<?php echo $mobile?>" size="20">
                  &nbsp;</td>
              </tr>
              
              <tr>
                <td>Phương thức Thanh toán</td>
                <td><label>
                  <input name="paymentmethod" type="radio" id="paymentmethod" value="1" checked>
                Tiền mặt 
                <input type="radio" name="paymentmethod" id="paymentmethod2" value="2">
                Chuyển khoản
                <input type="radio" name="paymentmethod" id="paymentmethod3" value="3"> 
                ATM
</label></td>
              </tr>
              <tr>
                <td>Thời gian Giao hàng </td>
                <td><input name="delivery" type="radio" id="paymentmethod4" value="1">
1-2 ngày
  <input type="radio" name="delivery" id="paymentmethod5" value="2">
3-5 ngày
<input name="delivery" type="radio" id="paymentmethod6" value="3" checked>
6-10 ngày 
<input type="radio" name="delivery" id="paymentmethod7" value="3">
11-15 ngày</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type=submit value="Đặt hàng">
                  &nbsp;&nbsp;
                  <input type="reset" value="Huỷ"></td>
              </tr>
            </table></td>
          </tr>
          
          <tr>
            <td> 
         
        <br>
      	GIỎ HÀNG<br>
       
      <?php
	   
		if(isset($_SESSION["Cart"]))
		{
			?>
              
           <table border="1" width="96%" cellspacing="1" cellpadding="1">
            <tr><td>Mã</td><td>Tên</td><td>Số lượng</td>
            <td>Giá</td><td>Thành tiền</td></tr>
        	<?php
				$shop=$_SESSION["Cart"];
			    $totalamount=0;
			 	for ($row = 0; $row < count($shop); $row++)
				{
					echo "<tr><td>";
					echo $shop[$row]["Id"]."</td>";
					echo "<td>".$shop[$row]["Title"]."</td>";
					echo "<td>".$shop[$row]["Quantity"] ;
					echo "</td>";
					echo "<td>".$shop[$row]["Price"]."</td>";
					echo "<td>".$shop[$row]["Amount"]."</td>";
					$totalamount += $shop[$row]["Amount"];
					echo "</tr>";
				}
			
		  ?>
		  </table>
          <input type=hidden name="totalamount" value="<?php echo $totalamount;?>">Total Amount:  <?php echo $totalamount;?> 
         <?php
		  
	}
	else
	 echo "Xin lỗi, giỏ hàng của bạn bị rỗng.";
	?>
      </form>
      </td>
      </tr>
  </table>
      <td width="242"  valign="top"><?php require("right.php");?></td>
    </tr>
    <tr>
      <td colspan="3"  valign="top"><?php include("bottom.htm");?></td>
    </tr>
  </table>
</div>
</body>
</html>
