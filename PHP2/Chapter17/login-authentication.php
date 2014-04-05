<?php
	session_start (); 
	$email = $_POST["username"];
	$pwd = $_POST["password"];
    $fromcart = "";
	if(isset($_GET["from"]))
		$fromcart =$_GET["from"];
	 
	 
	$select = "select UserId, Password, Name from Customers ";
	$select .= "where UserName='".$email. "'";
 
	require("ZendProvider.php");
	$zendProvider = new ZendProvider();
	try {  
		 
	  $result = $zendProvider->FetchRows($select);
	   
	} 
	catch(Exception $e) 
	{
	  die ('ERROR: ' . $e->getMessage());
	}
	if($result!=null)
	{
		$row = $result[0];
		echo ($pwd==$row[1]);
		if( $pwd== $row[1])
		{
			unset($_SESSION["Wrong"]);
			$_SESSION["UserId"] =  $row[0];
			$_SESSION["FullName"] =  $row[2];
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
	 
?>