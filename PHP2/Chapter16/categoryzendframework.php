<?php
$sql = 'SELECT CategoryId, CategoryName FROM Categories';
$result = $db->fetchPairs($sql);
foreach($result as $key => $value)
{
        echo "<a href='listzendframework.php?category=".$key."'>".$value."</a><br>";
}

?>
