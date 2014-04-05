<?php
class DerivedClass extends BaseClass
{
    function DerivedClass() 
    {
        echo "Constructor of derived class";
    }
    function __construct() 
    {
        echo "Constructor of derived class";
    }
    var $field="default value";
    function Display()
    {
	echo $this->field;
	echo "<br>";
	parent::__construct();
	echo "<br>";
	parent::ShowValue();
    }
    public function __destruct() {
		echo "<br>This is Destructor of derived class";
    }

}
?>