<html>
<head>
	<title>
		Welcome to $_POST
	</title>
</head>
<body>
	<div>&amp;</div>
	<form  method="post" action="ex9-1.php">
	<table><tr><td>Keyword: </td>
	<td><input type="text" name="keyword"></td></tr>
	<tr><td>City: </td><td><select name="city">
		<option value="HCM">Ho Chi Minh</option>
		<option value="HAN">Ha Noi</option>
		<option value="HUE">Hue</option>
	      </select></td></tr>
	<tr><td>Gender:</td>
	<td><input name="gender" value=Male type=radio checked>Male
	 <input value="Female" name="gender"  type=radio>Female</td></tr>
	<tr><td>&nbsp;</td><td><input type="submit" value="Search">
	</td></tr>
	</table></form>
</body>
</html>
