<?php
	session_start (); 
	$email = $_POST["username"];
	$pwd = $_POST["password"];
    $fromcart = "";
	if($_GET["from"])
		$fromcart =$_GET["from"];
	require("connection.ini");
	 
	$select = "select * from Customers ";
	$select .= "where UserName='".$email. "'";
	//echo $select;
	$result = mysql_query($select, $connect);
	if($result!=null)
	{
		if($row = mysql_fetch_array($result))
	 	{
			echo ($pwd==$row["Password"]);
			if( $pwd== $row["Password"])
			{
				unset($_SESSION["Wrong"]);
				$_SESSION["UserId"] =  $row["UserId"];
				$_SESSION["FullName"] =  $row["Name"];
				$_SESSION["Email"] =  $email;
				if($fromcart =="cart")
					header("Location:checkout.php");
				else
					header("Location:myaccount.php");
			}
			else
			{
				if($fromcart =="cart")
					header("Location:checkout.php");
				else
				{
					$_SESSION["Wrong"] = "2";
					header("Location:login.php");
				}
			}
		}
	}
	else
	{
		if($fromcart =="cart")
			header("Location:checkout.php");
		else
		{
			$_SESSION["Wrong"] = "1";
			header("Location:login.php");
		}
	}
	require("closeconnection.ini");
?>