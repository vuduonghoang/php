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
<table border="1">
<tr> 
	 
          <th>User Id</th>
          <th>User Name</th>
<th>Password</th>

           <th>Register Date</th>
<th>LastLogin</th>

        </tr>        
<?php

$sql = "SELECT UserId, UserName, Password";
$sql.=",RegisterDate, LastLogin from Users";


$rows =$db->fetchAll($sql);
 


for($i=0; $i<count($rows);$i++)
{
?> 
   
        <tr> 
		 
          <td><?php echo $rows[$i][0]?></td>
          <td><a href="editzendframework.php?id=<?php echo $rows[$i][0]?>"><?php echo $rows[$i][1]; ?></a></td>
           <td><?php echo $rows[$i][2]; ?></td>
		<td><?php echo $rows[$i][3]; ?></td>
		<td><?php echo $rows[$i][4]; ?></td>
        </tr>        
  <?php
	 
}
?>
 </table>
<form action="savezendframework.php" 
method=post name=form1>

<table>
 
<tr><td>User Name: </td><td><input type=text name="name"></td></tr>
<tr><td>Password: </td><td><input type=password name="password"></td></tr>

<tr><td></td><td><input type=submit value="Save"></td></tr>
</table>
</form>
</body>
</html>

 
