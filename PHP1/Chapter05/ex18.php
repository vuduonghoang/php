<html><body>
Array<br><hr>
<?php
	 
	$n=10;
	$Items=array($n);	
	for ($i=0;$i<$n;$i++)
	   $Items[$i]=($i+1)*2;
	foreach($Items as $key => $value)
   	{
        		echo $key."=>".$value."<br>";
    	}

?>
</body>
</html>
