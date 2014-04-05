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
      <td width="548"  valign="top" align="left">
       <table border="0" width="100%" cellspacing="50" cellpadding="5">
       <tr><td>
     <!--begin body-->
		<?php
        if(isset($_POST["itemid"]))
        {
            session_start();
            $id = $_POST["itemid"];
            $name= $_POST["itemname"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            $amount = $price*$quantity;
            $isnew = true;
			$shop = null;
            if(isset($_SESSION["Cart"] ))
            {
				 
                $shop = $_SESSION["Cart"] ;
                $shop = IsAddOrUpdate($shop, $id, $name, $quantity, $price, $amount, $isnew );
            }
            else
            {
			 
                $shop = array();
                $shop = array( array( "Id"=>$id, "Title"=>$name, "Price" => $price, "Quantity" => $quantity, "Amount"=>$amount ) );
            }
            
            $_SESSION["Cart"] = $shop;
            ?>
            
            Bạn đã <?php echo ($isnew?"thêm mới ":"cập nhật số lượng của "); 
            echo "[".$name."]"?> vào giỏ hàng.
          
        <?php
        }
        else
            echo "Xin lỗi, bạn chưa chọn sản phẩm.";
        ?>
          <!--end body-->
      </td></tr>
      <tr><td>
      
      <a href="viewcart.php">Xem giỏ hàng</a>    &nbsp;<a href="javascript:window.history.go(-1);">Tiếp tục mua hàng</a>    
      </td></tr></table>
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
<?php
		function IsAddOrUpdate($shop, $id, $name, $quantity, $price, $amount, &$isnew)
		{
			 
			$numberofitems = count($shop);
			 
			for($i=0; $i<$numberofitems; $i++)
			{
				 
				if($shop[$i]["Id"] == $id)
				{
					$shop[$i]["Quantity"] += $quantity;
					$shop[$i]["Amount"] = $shop[$i]["Quantity"]*$shop[$i]["Price"];
					$isnew = false; break;
				}
				
			}
			if($isnew ==true)
			{ 
				  
				$shop[$numberofitems] = array( "Id"=>$id, "Title"=>$name, "Price" => $price, "Quantity" => $quantity, "Amount"=>$amount ) ;
			}
			return $shop;
		}
		?>