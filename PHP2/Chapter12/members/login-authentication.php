<?php
	session_start (); 
	$memberusername = $_POST["username"];
	$pwd = $_POST["password"];
 	 
	require("../connection.ini");
	 
	$select = "SELECT * FROM `users` ";
	$select .= " WHERE UserName='".$memberusername. "'";
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
				$_SESSION["MemberId"] =  $row["UserId"];
				$_SESSION["MemberName"] =  $row["MemberName"];
				$_SESSION["UserName"] =  $memberusername;
				header("Location:myaccount.php");
			}
			else
			{
				$_SESSION["Wrong"] = "2";
				header("Location:login.php");
				
			}
		}
	}
	else
	{
		$_SESSION["Wrong"] = "1";
		header("Location:login.php");
		
	}
	require("../closeconnection.ini");
?>