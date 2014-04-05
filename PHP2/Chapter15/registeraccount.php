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
		
		$sql = "select UserId from Customers";
		$sql .= " where UserName='".replace($email)."'";
		require("/classes/MySQLProvider.php");
		$mySQLProvider = new MySQLProvider();
		 
		$resultcustomer = $mySQLProvider->GetResultSet($sql);
			 
		if($masterrow = mysql_fetch_array($resultcustomer))
		{
			header("Location:thankyou.php?type=newaccount");
		}
		else
		{	
			$sql = "insert into Customers (UserName,";
			$sql .= "Password, Name, Address,Phone,";
			$sql .= "Mobile, ProvinceId)";
			$sql .= "values('".replace($email)."','";
			$sql .= replace($password)."','".replace($fullname)."','";
			$sql .= replace($address)."','".replace($phone)."','";
			$sql .= replace($mobile)."','".$province."')";
			
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
						header("Location:myaccount.php");
					}
				$mySQLProvider->CloseConnection();
			}
		}
	}
	else
		header("Location:newaccount.php");
?>