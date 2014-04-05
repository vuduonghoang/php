<?php
function int_divide($x, $y) {
    if ($x == 0) return 0;
    if ($y == 0) return FALSE;
    $result = $x/$y;
    $pos = strpos($result, '.');
    if (!$pos) {
        return $result;
    } else {
        return (int) substr($result, 0, $pos);
    }
} 
function replace($strtoreplace)
{
	return str_replace("'","''",$strtoreplace);
}
?>