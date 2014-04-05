<html><body>
Array<br><hr>
<?php
	 
	$n=10;
	$Items=array($n);	
	for ($i=0;$i<$n;$i++)
	   $Items[$i]=($i+1)*2;
	for ($i=0;$i<$n;$i++)
	   echo "element $i=".$Items[$i]."<br>";
?>
</body>
</html>
