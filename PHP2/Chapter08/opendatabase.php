<html>
	<head>
		<title>Open MySQL Database</title>
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
			echo "Connected to MySQL <br>";
			mysql_select_db ("MarketoHome", $connect);
			echo "Selected MarketoHome database";
			mysql_query("SET NAMES 'utf8'");
			echo "<br>Working with Unicode";
			//do something
		}
		mysql_close($connect); 
	?>
	</body>
</html>