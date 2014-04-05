<?php
 
	setcookie("username", "khang", time()+3600);
	setcookie("password", "1234", time()+3600);
?>
<html>
	<body>
		Set Cookie 60sec * 60 min = 1 hour<br>
		<a href="readcookie.php">Get Cookie</a>
	</body>
</html>