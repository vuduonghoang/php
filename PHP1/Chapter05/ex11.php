<html>
<head>
	<title>
		Welcome to $_GET
	</title>
</head>
<body>
	
	<table>
	<tr><td><a href="ex11.php?category=book">Book</a></td></tr>
	<tr><td><a href="ex11.php?category=software">Software</a></td></tr>
	<tr><td><a href="ex11.php?category=computer">Computer</a></td></tr>
	<tr><td><a href="ex11.php?category=electronic">Electronic</a></td></tr>
	</table>
	<?php
	$category=$_GET["category"];
	 
	echo "Selected category: " . $category;
	?>
</body>
</html>
