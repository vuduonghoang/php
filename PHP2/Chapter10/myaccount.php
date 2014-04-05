<?php
session_start (); 
if (!isset($_SESSION["UserId"]))
	header("Location:login.php");
?>
<html>
	<head>
		<script>
			
		</script>
	</head>
	<body>
		MY ACCOUNT<br>
		Hello: <?php echo $_SESSION["FullName"];?><br>
		<a href="search.php">Search</a> 
        | <a href="logout.php">Logout</a>
	</body>
</html>