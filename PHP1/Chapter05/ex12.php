<html>
<head>
	<title>
		Welcome to ISSET function
	</title>
</head>
<body>
	
	<table>
	<tr><td><a href="ex12.php?category=book">Book</a></td></tr>
	<tr><td><a href="ex12.php?category=software">Software</a></td></tr>
	<tr><td><a href="ex12.php?category=computer">Computer</a></td></tr>
	<tr><td><a href="ex12.php?category=electronic">Electronic</a></td></tr>
	</table>
	<?php
	if(isset($_GET["category"]))
	{
		$category=$_GET["category"];
		echo "Selected category: " . $category;
	}
	?>
</body>
</html>
