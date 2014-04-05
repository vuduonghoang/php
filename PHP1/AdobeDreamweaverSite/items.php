<?php require_once('Connections/MarketoHome.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
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
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_ViewItemsRecordset = 5;
$pageNum_ViewItemsRecordset = 0;
if (isset($_GET['pageNum_ViewItemsRecordset'])) {
  $pageNum_ViewItemsRecordset = $_GET['pageNum_ViewItemsRecordset'];
}
$startRow_ViewItemsRecordset = $pageNum_ViewItemsRecordset * $maxRows_ViewItemsRecordset;

mysql_select_db($database_MarketoHome, $MarketoHome);
$query_ViewItemsRecordset = "SELECT ItemId, ItemName, Pages, Price, PublishYear, Edition, `Size`, Weight FROM items";
$query_limit_ViewItemsRecordset = sprintf("%s LIMIT %d, %d", $query_ViewItemsRecordset, $startRow_ViewItemsRecordset, $maxRows_ViewItemsRecordset);
$ViewItemsRecordset = mysql_query($query_limit_ViewItemsRecordset, $MarketoHome) or die(mysql_error());
$row_ViewItemsRecordset = mysql_fetch_assoc($ViewItemsRecordset);

if (isset($_GET['totalRows_ViewItemsRecordset'])) {
  $totalRows_ViewItemsRecordset = $_GET['totalRows_ViewItemsRecordset'];
} else {
  $all_ViewItemsRecordset = mysql_query($query_ViewItemsRecordset);
  $totalRows_ViewItemsRecordset = mysql_num_rows($all_ViewItemsRecordset);
}
$totalPages_ViewItemsRecordset = ceil($totalRows_ViewItemsRecordset/$maxRows_ViewItemsRecordset)-1;

$queryString_ViewItemsRecordset = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ViewItemsRecordset") == false && 
        stristr($param, "totalRows_ViewItemsRecordset") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ViewItemsRecordset = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_ViewItemsRecordset = sprintf("&totalRows_ViewItemsRecordset=%d%s", $totalRows_ViewItemsRecordset, $queryString_ViewItemsRecordset);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1" cellpadding="1" cellspacing="1">
  <tr>
    <td>ItemId</td>
    <td>ItemName</td>
    <td>Pages</td>
    <td>Price</td>
    <td>PublishYear</td>
    <td>Edition</td>
    <td>Size</td>
    <td>Weight</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_ViewItemsRecordset['ItemId']; ?></td>
      <td><?php echo $row_ViewItemsRecordset['ItemName']; ?></td>
      <td><?php echo $row_ViewItemsRecordset['Pages']; ?></td>
      <td><?php echo $row_ViewItemsRecordset['Price']; ?></td>
      <td><?php echo $row_ViewItemsRecordset['PublishYear']; ?></td>
      <td><?php echo $row_ViewItemsRecordset['Edition']; ?></td>
      <td><?php echo $row_ViewItemsRecordset['Size']; ?></td>
      <td><?php echo $row_ViewItemsRecordset['Weight']; ?></td>
    </tr>
    <?php } while ($row_ViewItemsRecordset = mysql_fetch_assoc($ViewItemsRecordset)); ?>
</table>

<table border="0">
  <tr>
    <td><?php if ($pageNum_ViewItemsRecordset > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_ViewItemsRecordset=%d%s", $currentPage, 0, $queryString_ViewItemsRecordset); ?>">First</a>
        <?php } // Show if not first page ?>
    </td>
    <td><?php if ($pageNum_ViewItemsRecordset > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_ViewItemsRecordset=%d%s", $currentPage, max(0, $pageNum_ViewItemsRecordset - 1), $queryString_ViewItemsRecordset); ?>">Previous</a>
        <?php } // Show if not first page ?>
    </td>
    <td><?php if ($pageNum_ViewItemsRecordset < $totalPages_ViewItemsRecordset) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_ViewItemsRecordset=%d%s", $currentPage, min($totalPages_ViewItemsRecordset, $pageNum_ViewItemsRecordset + 1), $queryString_ViewItemsRecordset); ?>">Next</a>
        <?php } // Show if not last page ?>
    </td>
    <td><?php if ($pageNum_ViewItemsRecordset < $totalPages_ViewItemsRecordset) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_ViewItemsRecordset=%d%s", $currentPage, $totalPages_ViewItemsRecordset, $queryString_ViewItemsRecordset); ?>">Last</a>
        <?php } // Show if not last page ?>
    </td>
  </tr>
</table>

Records <?php echo ($startRow_ViewItemsRecordset + 1) ?> to <?php echo min($startRow_ViewItemsRecordset + $maxRows_ViewItemsRecordset, $totalRows_ViewItemsRecordset) ?> of <?php echo $totalRows_ViewItemsRecordset ?>
</body>
</html>
<?php
mysql_free_result($ViewItemsRecordset);
?>
