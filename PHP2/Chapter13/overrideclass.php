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
   function ShowValue()
    {
	echo "ShowValue function of DerivedClass";
	 
    }
    public function __destruct() {
		echo "<br>This is Destructor of override class";
    }

}
?>