<?php
class BaseClass
{
   function __construct()
   {
        echo "Constructor of base class";
   }
   var $attribute="default value of base class";
   function get_attribute()
   {
         return $this->attribute;
    }
   function set_attribute($value)
   {
         $this->attribute=$value;
	echo "ShowValue function of BaseClass";
   }
    public function ShowValue() 
    {
        echo $this->attribute;
    }
    public function __destruct() {
		echo "<br>This is Destructor of base class";
    }
}
?>