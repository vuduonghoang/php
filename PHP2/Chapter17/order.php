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
		$table ="Orders";
		$data = array( "UserId"=>$_SESSION["UserId"],
		"OrderDate"=>new Zend_Db_Expr('CURDATE()'), 
		"FullName"=>replace($fullname), 
		"Address"=>replace($address);
		"Telephone"=>replace($phone), 
		"Mobile"=>replace($mobile), 
		"ProvinceId"=>$province,
		"PaymentMethodId"=>$payment,
		"DeliveryId"=>$delivery,
		"Amount"=>$delivery);

		require("ZendProvider.php");
		$zendProvider = new ZendProvider();
		$result = $zendProvider->Insert($table, $data);
			 
		if($result!=null)
		{
			$sql = "select OrderId from Orders";
			$sql .= " where UserId='".$_SESSION["UserId"];
			$sql .= "' order by OrderId DESC limit 0 , 1";
			
			
			$result = $zendProvider->FetchRows($sql);
			 
			if($result!=null)
			{
				$orderid = $result[0][0];
				$shop=$_SESSION["Cart"];
				for ($row = 0; $row < count($shop); $row++)
				{
					$table ="OrderDetails";
					$data = array( "UserId"=>$_SESSION["UserId"],
					"OrderId"=>$orderid, 
					"No"=>$row, 
					"ItemId"=>$shop[$row]["Id"];
					"Qtty"=>$shop[$row]["Quantity"], 
					"Price"=>$shop[$row]["Price"], 
					"Amount"=>$shop[$row]["Amount"]);
					 
					$result = $zendProvider->Insert($table, $data);
			
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
		
	}
	else
		header("Location:checkout.php");
	
?>