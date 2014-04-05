<?php
	session_start (); 
	if (!isset($_SESSION["UserId"]))
		header("Location:login.php");
	
	if(isset($_POST["fullname1"]))
	{
		require("common.php");
		 
		$fullname = $_POST["fullname1"];
		$phone = $_POST["phone1"];
		$mobile = $_POST["mobile1"];
		$address = $_POST["address1"];
		$province = $_POST["province1"];
		$payment = $_POST["paymentmethod"];
		$delivery = $_POST["delivery"];
		$totalamount = $_POST["totalamount"];
		 
		$sql = "insert into Orders (UserId, ";
		$sql .= "OrderDate, FullName, Address,";
		$sql .= "Telephone, Mobile, ProvinceId,";
		$sql .= "PaymentMethodId,DeliveryId,Amount)";
		$sql .= "values('".$_SESSION["UserId"];
		$sql .= "',curdate(),'".replace($fullname)."','";
		$sql .= replace($address)."','".replace($phone)."','";
		$sql .= replace($mobile)."','".$province."','";
		$sql .= $payment."','".$delivery ."','";
		$sql .= $totalamount."')";

		require("/classes/MySQLProvider.php");
		$mySQLProvider = new MySQLProvider();
		$result = $mySQLProvider->GetResultSet($sql);
			 
		if($result!=null)
		{
			$sql = "select OrderId from Orders";
			$sql .= " where UserId='".$_SESSION["UserId"];
			$sql .= "' order by OrderId DESC limit 0 , 1";
			 
			$result = $mySQLProvider->GetResultSet($sql);
			 
			while($masterrow = mysql_fetch_array($result))
			{
				$orderid = $masterrow["OrderId"];
				$shop=$_SESSION["Cart"];
				for ($row = 0; $row < count($shop); $row++)
				{
					 
					$sql = "insert into OrderDetails (OrderId, ";
					$sql .= "No, ItemId, Qtty,Price,Amount)";
					$sql .= "values('".$orderid."','".$row."','";
					$sql .= $shop[$row]["Id"]."','";
					$sql .= $shop[$row]["Quantity"]."','";
					$sql .= $shop[$row]["Price"]."','";
					$sql .= $shop[$row]["Amount"]."')";
					 
					$result = $mySQLProvider->GetResultSet($sql);
			
				}
				$_SESSION["Cart"] = null;
				unset($_SESSION["Cart"]);
			}
			
			header("Location:thankyou.php?type=order");
		}
		else
		{
			 
			header("Location:checkout.php");
		}
		$mySQLProvider->CloseConnection();
	}
	else
		header("Location:checkout.php");
	
?>