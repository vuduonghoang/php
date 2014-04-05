<?php
if(isset($_POST["from"]))
{
	require("connection.ini");
	$from = $_POST["from"];
	$id = $_POST["id"];
	
	$name = $_POST["categoryname"];
	$group = $_POST["groupname"];
	if($id=="")
	{
		$insert= "insert into Categories(CategoryName, GroupId)";
		$insert.=" values('".replace($name)."','". $group."')";
		//$insert.=" values('".$name."','". $group."')";
	}
	else
	{
		$insert= "update Categories set CategoryName=";
		$insert.="'".replace($name)."',GroupId='". $group."'";
		$insert.=" where categoryid='".$id."'";
	}	
	if(mysql_query($insert, $connect))
	 {
		header("Location:categories.php");
	 }  
	else
		echo "Error inserting: " . mysql_error();
	require("closeconnection.ini");
}

function replace($strtoreplace)
{
	return str_replace("'","''",$strtoreplace);
}

?>