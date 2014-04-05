<?php require_once('Connections/MarketoHome.php'); ?>
<?php
/*if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
	var_dump($theValue);
	//echo $theValue;
  return $theValue;
}
}*/

mysql_select_db($database_MarketoHome, $MarketoHome);
$query_ViewCategoriesRecordset = "SELECT CategoryId, CategoryName FROM categories";
//echo $query_ViewCategoriesRecordset;
$ViewCategoriesRecordset = mysql_query($query_ViewCategoriesRecordset, $MarketoHome) or die(mysql_error());
$row_ViewCategoriesRecordset = mysql_fetch_assoc($ViewCategoriesRecordset);

$totalRows_ViewCategoriesRecordset = mysql_num_rows($ViewCategoriesRecordset);
echo '<pre>';
print_r($totalRows_ViewCategoriesRecordset);
echo '</pre>';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td>CategoryId</td>
    <td>CategoryName</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_ViewCategoriesRecordset['CategoryId']; ?></td>
      <td><a href=updatecategory.php?CategoryId=<?php echo $row_ViewCategoriesRecordset['CategoryId']; ?>>
	  <?php echo $row_ViewCategoriesRecordset['CategoryName']; ?></a></td>
    </tr>
    <?php } while ($row_ViewCategoriesRecordset = mysql_fetch_assoc($ViewCategoriesRecordset)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($ViewCategoriesRecordset);
?>
