<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
</head>

<body bottomMargin=0 leftMargin=0 topMargin=0 rightMargin=0>

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
?>
      
<?php

$sql = "SELECT UserId, UserName, Password,";
$sql.="RegisterDate, LastLogin from Users where UserId=?";
$userId = isset($_GET['id']) ? (int) htmlentities($_GET['id']) : 0;
$name = "";
$pwd="";

if($userId>0)
{
$row =$db->fetchAll($sql, $userId);
 
?> 
    
<form action="updatezendframework.php" 
method=post name=form1>

<table>
 
<tr><td>User Name: </td><td>
<input type=text name="name" 
value="<?php echo $row[0][1]?>"></td></tr>
<tr><td>Password: </td><td>
<input type=password name="password"
value="<?php echo $row[0][2]?>"></td></tr>
<tr><td>Register Date: </td><td>
<?php echo $row[0][3]?></td></tr>
<tr><td>Last Login: </td><td>
<?php echo $row[0][4]?></td></tr>
<tr><td><input type=hidden name="id" 
value="<?php echo $row[0][0]?>"></td>
<td><input type=submit value="Save"></td></tr>
</table>
 <?php
	 
}
?>
</form>
</body>
</html>

 
