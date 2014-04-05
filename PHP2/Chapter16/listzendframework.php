<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" 
content="text/html; charset=utf-8" />
<title>Market To Home</title>
</head>

<body bottomMargin=0 leftMargin=0 
topMargin=0 rightMargin=0>
<table border="1">
<tr> 
	<td valign=top nowrap>
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

require_once 'categoryzendframework.php';
?>
</td><td valign=top>
<table border="1">
<tr> 
          <th>Item Id</th>
          <th>Item Name</th>
          <th>Price</th>
          <th>Size</th>
          <th>PublishYeay</th>
        </tr>        
<?php




$category= isset($_GET['category']) ? (int) htmlentities($_GET['category']) : 0;

$sql = 'SELECT ItemId, ItemName,Price,';
$sql.= 'Size, PublishYear FROM Items';

if($category>0)
{
	$sql.=" where CategoryId =?";
	$rows =$db->fetchAll($sql,$category);
}
else
	$rows =$db->fetchAll($sql);
 


for($i=0; $i<count($rows);$i++)
{
?> 
   
        <tr> 
          <td><?php echo $rows[$i][0]?></td>
          <td><?php echo $rows[$i][1]; ?></td>
          <td><?php echo $rows[$i][2]; ?></td>
          <td><?php echo $rows[$i][3]; ?></td>
          <td><?php echo $rows[$i][4]; ?></td>
        </tr>        
  <?php
	 
}
?>
 </table>
</td></tr></table>

</body>
</html>

 
