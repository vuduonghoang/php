<html>
	<head>
		<title>ITEMS</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	</head>
	<body>
	<?php
		$connect = mysql_connect("localhost","root","");
		if (!$connect) {
			die('Could not connect MySQL: ' . mysql_error());
		}
		else
		{
			mysql_select_db ("MarketoHome", $connect);
			mysql_query("SET NAMES 'utf8'");
			$select = "select ItemId, ItemName from Items";
			$result = mysql_query($select, $connect);
			
			while($row = mysql_fetch_row($result))
			 {
    				echo $row[0]. " " .$row[1] ;
				echo "<br>";
			 }  
		}
		mysql_close($connect); 
	?>
	</body>
</html>