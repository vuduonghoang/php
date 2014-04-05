<?php
if(isset($_GET["from"]))
{
	if(isset($_GET["from"]))
	{
		require("connection.ini");
		$from = $_GET["from"];
		if(isset($_GET["id"]))
		{
			$delete= "";
			$gotopage = "";
			$id = $_GET["id"];
			if(is_numeric($id))
			{
				switch($from)
				{
					case "customer":
						$delete= " delete from customers ";
						$delete.=" where Userid='".$id."'";
						$gotopage = "customers.php";
					break;
				 }
			}
			 	
			if($delete !="" && mysql_query($delete, $connect))
			 {
				header("Location:" .$gotopage);
			 }  
			else
				echo "Error inserting: " . mysql_error();
		}
		require("closeconnection.ini");
	}
	
}

?>