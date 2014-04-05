<html><body>
Multidimential array<br>
<?php
	$products=array(array("TIR","Tires", 100),array("COR","Concord", 1000),array("BOE","Boeing", 5000));
	for ($row=0;$row<3;$row++)
	  {
	    for ($col=0;$col<3;$col++)
   		{
		 echo "\t|\t".$products[$row][$col];
		}
	    echo "<br>";
	  }
	$products[0][0]="A";
	$products[0][1]="A1";
	$products[0][2]=10;
	$products[1][0]="B";
	$products[1][1]="B1";
	$products[1][2]=20;
	$products[2][0]="C";
	$products[2][1]="C1";
	$products[2][2]=30;
	for ($row=0;$row<3;$row++)
	  {
	    for ($col=0;$col<3;$col++)
   		{
		 echo "\t|\t".$products[$row][$col];
		}
	    echo "<br>";
	  }
?>
</body>
</html>
