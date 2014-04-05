<?php
 require_once 'Zend/Date.php';

 $a=Zend_Date::checkLeapYear(2010);
 
 if($a)
	echo "This year is leap year";
 else
 {
 	echo "This year is not leap year";
 }

?>