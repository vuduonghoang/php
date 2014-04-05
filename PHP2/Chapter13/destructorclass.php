<?php
class PHPClass
{
    function __construct() 
    {
        echo "Constructor with __construct<br>";
    }
    function ShowValue()
    {
	echo "construct and destruct<br>";
    }
    function __destruct() 
    {
        echo "Destructor with __destruct<br>";
    }
}
?>