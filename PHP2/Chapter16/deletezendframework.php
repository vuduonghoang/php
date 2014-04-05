
<?php
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
$db = Zend_Db::factory('Pdo_Mysql', 
array(
	'host'     => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname'   => 'marketohome'));
$db->query("SET NAMES 'utf8'");
$db->setFetchMode(Zend_Db::FETCH_NUM);
$data = $_POST["itemid"];
$n = 0 ;
for($i=0; $i<count($data); $i++)
{

	$n += $db->delete('OrderDetails', 'OrderDetailId='.$data[$i]);

}

 header("Location:checkboxzendframework.php");

 
?>
  