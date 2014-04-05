<html><body>
Sort array by sort
<br>
<?php
	$products=array("Tires", "Oil", "Van");
	echo "Before<br>";
	for ($row=0;$row<3;$row++)
	  	{
		 echo "\t|\t".$products[$row];
		    echo "|<br>";
	  	}
	sort($products);
	echo "After<br>";
	for ($row=0;$row<3;$row++)
	  	{
		 echo "\t|\t".$products[$row];
		    echo "|<br>";
	  	}
?>
</body>
</html>
