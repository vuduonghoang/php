
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
$id = $_POST["id"];
$name = $_POST["name"];
$pwd = $_POST["password"];
echo $name;

$data = array(
	 
	'RegisterDate' => new Zend_Db_Expr('CURDATE()'),
	'LastLogin' => new Zend_Db_Expr('CURDATE()'),        	'UserName' => $name,    
	'Password' => $pwd,
	'MemberName' => "",
	'IsActivate' => 1);
$db->update('Users', $data,"UserId=".$id);

header("Location:addnewzendframework.php");

 
?>
  