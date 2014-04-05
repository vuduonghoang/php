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
		 
		 
		$sql = "insert into Customers (UserName,";
		$sql .= "Password, Name, Address,Phone,";
		$sql .= "Mobile, ProvinceId)";
		$sql .= "values('".replace($email)."','";
		$sql .= replace($password)."','".replace($fullname)."','";
		$sql .= replace($address)."','".replace($phone)."','";
		$sql .= replace($mobile)."','".$province."')";
		
		require("/classes/MySQLProvider.php");
		$mySQLProvider = new MySQLProvider();
		$resultcustomer = $mySQLProvider->GetResultSet($sql);
		 
		if($resultcustomer!=null)
		{
			$sql = "select UserId from Customers";
			$sql .= " where UserName='".replace($email)."'";
			 
			$resultcustomer = $mySQLProvider->GetResultSet($sql);
			 
			if($masterrow = mysql_fetch_array($resultcustomer))
				{
					$_SESSION["UserId"]= $masterrow["UserId"];
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
				
				$resultorder = $mySQLProvider->GetResultSet($sql);
 				if($resultorder!=null)
				{
					$sql = "select OrderId from Orders";
					$sql .= " where UserId='".$_SESSION["UserId"];
					$sql .= "' order by OrderId DESC limit 0, 1";
					 
					$resultorder = $mySQLProvider->GetResultSet($sql);
 					if($resultorder!=null)
					{
						while($master = mysql_fetch_array($resultorder))
						{
							$orderid = $master["OrderId"];
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
								$resultdetail = mysql_query($sql, $connect);
								 
								$resultdetail = $mySQLProvider->GetResultSet($sql);
			 
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
		 
	$mySQLProvider->CloseConnection();
	}
	else
		header("Location:checkout.php");
?>