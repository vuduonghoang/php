<?php
require_once "calculator.php";

class CalculatorTest extends PHPUnit_Framework_TestCase
{
	public function testAdd()
	{
		$a = 5;
		$b = 10;
		
		$exp = $a + $b;

		$obj = new Calculator();
		$ret = $obj->add($a, $b);
		
		$this->assertEquals($exp, $ret);
	}
	
	public function testSub()
	{
		$a = 5;
		$b = 10;
		
		$exp = $a - $b;

		$obj = new Calculator();
		$ret = $obj->add($a, $b);
		
		$this->assertEquals($exp, $ret);
	}
}
?>