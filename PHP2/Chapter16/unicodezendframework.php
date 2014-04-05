<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
</head>

<body bottomMargin=0 leftMargin=0 
topMargin=0 rightMargin=0>
<?php

require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
$db = Zend_Db::factory('Pdo_Mysql', 
array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname'   => 'marketohome'));
$db->query("SET NAMES 'utf8'");
$sql = 'SELECT ItemId, ItemName  FROM Items';
$db->setFetchMode(Zend_Db::FETCH_OBJ);
$result = $db->fetchPairs($sql);
 
	foreach($result as $key => $value)
   	{
        		echo $key."=>".$value."<br>";
    	}

?>
</body>
</html>