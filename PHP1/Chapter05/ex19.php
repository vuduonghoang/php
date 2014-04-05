<html><body>
Use while and Each function<br>
<?php
	$n=10;
	$Items=array($n);	
	for ($i=0;$i<$n;$i++)
	   $Items[$i]=$i*2;
	echo "No	Value<br>";
	while ($i=each($Items))
	   {
		echo $i["key"];
		echo "	";
		echo $i["value"]."<br>";
	}
?>
</body>
</html>