<html>
	<head>
		<title>Connect to MySQL Database</title>
	</head>
	<body>
	<?php
		$connect = mysql_connect("localhost","root","");
		if (!$connect) {
			die('Could not connect MySQL: ' . mysql_error());
		}
		else
		{
			echo "Connected to MySQL ";
			//do something
		}
		mysql_close($connect); 
	?>
	</body>
</html>