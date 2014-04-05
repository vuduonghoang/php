<?php
	session_start (); 
	$email = $_POST["username"];
	$pwd = $_POST["password"];
	require("connection.ini");
	$select = "select * from Customers ";
	$select .= "where UserName='".$email. "'";
	echo $select;
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
				header("Location:myaccount.php");
			}
			else
			{
				$_SESSION["Wrong"] = "2";
				//header("Location:login.php");
			}
		}
	}
	else
	{
		$_SESSION["Wrong"] = "1";
		header("Location:login.php");
	}
	require("closeconnection.ini");
?>