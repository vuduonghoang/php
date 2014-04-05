<html><body>
Use while and list function<br>
<?php
	$n=10;
	$Items=array($n);	
	for ($i=0;$i<$n;$i++)
	   $Items[$i]=$i*2;
	echo "Key  Value<br>";
	while (list($k,$v)=each($Items))
	   {
		echo $k;
		echo "&nbsp; &nbsp;   &nbsp; &nbsp;";
		echo $v."<br>";
	}
?>
</body>
</html>
