<html>
	<head>
		<title>ITEMS</title>
		<meta http-equiv="Content-Type" 
		content="text/html; charset=utf-8"> 
	</head>
	<body>
	<?php
		require("connection.ini");
		$select = "select ItemId, ItemName from Items";
		$result = mysql_query($select, $connect);
			
		while($row = mysql_fetch_array($result))
		 {
    			echo $row["ItemId"]. " " .$row["ItemName"] ;
			echo "<br>";
		}  
		require("closeconnection.ini");
	?>
	</body>
</html>