<?php
	setcookie("username", "khang", time()-1);
	setcookie("password", "1234", time()-1);
?>
<html>
	<body>
		Reset Cookie<br>
		<a href="readcookie.php">Get Cookie</a>
	</body>
</html>