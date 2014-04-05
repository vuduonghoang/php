<?php
	session_start ();
	require("common.php");
	if(isset($_POST["fullname"]))
	{
		 
		$fullname = $_POST["fullname"];
		$phone = $_POST["phone"];
		$mobile = $_POST["mobile"];
		$address = $_POST["address"];
		$province = $_POST["province"];
		$email = $_POST["username"];
		$password = $_POST["password"];
		 
		require("ZendProvider.php");
		$zendProvider = new ZendProvider();
		$table ="Customers";
		$data = array( "UserName"=>replace($email),
		"Password"=>replace($password), 
		"Name"=>replace($fullname), 
		"Address"=>replace($address);
		"Phone"=>replace($phone), 
		"Mobile"=>replace($mobile), 
		"ProvinceId"=>$province);
		$resultcustomer = $zendProvider->Insert($table, $data);
		 
		 
		if($resultcustomer!=null)
		{
			$sql = "select UserId from Customers";
			$sql .= " where UserName='".replace($email)."'";
			 
			$resultcustomer = $zendProvider->FetchRows($sql);
			 
			if($resultcustomer!=null)
				{
					$_SESSION["UserId"]= $resultcustomer[0][0];
					$_SESSION["FullName"] = $fullname;
					$_SESSION["Email"] =  $email;
				}
			if(isset($_SESSION["UserId"]) && isset($_POST["fullname1"]))
			{
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
				$resultorder = $zendProvider->Insert($table, $data);
				 
 				if($resultorder!=null)
				{
					$sql = "select OrderId from Orders";
					$sql .= " where UserId='".$_SESSION["UserId"];
					$sql .= "' order by OrderId DESC limit 0, 1";
					 
					$resultorder = $zendProvider->FetchRows($sql);
 					if($resultorder!=null)
					{
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
					}
					header("Location:thankyou.php?type=registerandorder");
				}
				else
				{
					 
					header("Location:checkout.php");
				}
			}
		}
		 
 
	}
	else
		header("Location:checkout.php");
?>