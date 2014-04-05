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
<form action="deletezendframework.php" 
method=post name=form1>
<table border="1">
<tr> 
	 <th>#</th>
          <th>Item Id</th>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Amount</th>
        </tr>        
<?php

$sql = "SELECT OrderDetailId, I.ItemId, ItemName,";
$sql .= "Qtty AS Quantity, D.Price, ";
$sql .= " Amount FROM Items I,";
$sql .= " OrderDetails D where I.ItemId=D.ItemId";


$rows =$db->fetchAll($sql);
 


for($i=0; $i<count($rows);$i++)
{
?> 
   
        <tr> 
		<td><input type=checkbox 
		id="itemid" name="itemid[]" 
		value="<?php echo $rows[$i][0]?>"</td>
          <td><?php echo $rows[$i][1]?></td>
          <td><?php echo $rows[$i][2]; ?></td>
          <td><?php echo $rows[$i][3]; ?></td>
          <td><?php echo $rows[$i][4]; ?></td>
          <td><?php echo $rows[$i][5]; ?></td>
        </tr>        
  <?php
	 
}
?>
 </table>
<table>
<td><input type=submit value="Delete"></td></tr></table>
</form>
</body>
</html>

 
