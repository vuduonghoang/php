<html><body>
Sort Multidimential array by array_multisort 
<br>
 
<?php
	 
	$products=array(array(100,20,  50),array(120,30,40));

	echo "Before<br>";
	for ($row=0;$row<2;$row++)
	  	{
		    for ($col=0;$col<3;$col++)
   			{
			 echo "\t|\t".$products[$row][$col];
			}
		    echo "|<br>";
	  	}

	array_multisort($products[0], SORT_NUMERIC, SORT_ASC, 
                 $products[1], SORT_NUMERIC, SORT_ASC);
 

	echo "After<br>";
	for ($row=0;$row<2;$row++)
	  	{
		    for ($col=0;$col<3;$col++)
   			{
			 echo "\t|\t".$products[$row][$col];
			}
		    echo "|<br>";
	  	}

?>
</body>
</html>
