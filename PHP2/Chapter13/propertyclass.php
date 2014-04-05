<?php
class PHPClass
{
   var $attribute="default value";
   function get_attribute()
   {
         return $this->attribute;
    }
   function set_attribute($value)
   {
         $this->attribute=$value;
   }
    public function ShowValue() 
    {
        echo $this->attribute;
    }
}
?>