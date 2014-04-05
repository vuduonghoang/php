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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE categories SET CategoryName=%s, GroupId=%s WHERE CategoryId=%s",
                       GetSQLValueString($_POST['CategoryName'], "text"),
                       GetSQLValueString($_POST['GroupId'], "int"),
                       GetSQLValueString($_POST['CategoryId'], "int"));

  mysql_select_db($database_MarketoHome, $MarketoHome);
  $Result1 = mysql_query($updateSQL, $MarketoHome) or die(mysql_error());
}

$colname_EditCategoriesRecordset = "-1";
if (isset($_GET['CategoryId'])) {
  $colname_EditCategoriesRecordset = $_GET['CategoryId'];
}
mysql_select_db($database_MarketoHome, $MarketoHome);
$query_EditCategoriesRecordset = sprintf("SELECT * FROM categories WHERE CategoryId = %s", GetSQLValueString($colname_EditCategoriesRecordset, "int"));
$EditCategoriesRecordset = mysql_query($query_EditCategoriesRecordset, $MarketoHome) or die(mysql_error());
$row_EditCategoriesRecordset = mysql_fetch_assoc($EditCategoriesRecordset);
$totalRows_EditCategoriesRecordset = mysql_num_rows($EditCategoriesRecordset);

mysql_select_db($database_MarketoHome, $MarketoHome);
$query_EditGroupsRecordset = "SELECT * FROM groups";
$EditGroupsRecordset = mysql_query($query_EditGroupsRecordset, $MarketoHome) or die(mysql_error());
$row_EditGroupsRecordset = mysql_fetch_assoc($EditGroupsRecordset);
$totalRows_EditGroupsRecordset = mysql_num_rows($EditGroupsRecordset);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">CategoryId:</td>
      <td><?php echo $row_EditCategoriesRecordset['CategoryId']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">CategoryName:</td>
      <td><input type="text" name="CategoryName" value="<?php echo htmlentities($row_EditCategoriesRecordset['CategoryName'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">GroupId:</td>
      <td><select name="GroupId">
        <?php 
do {  
?>
        <option value="<?php echo $row_EditGroupsRecordset['GroupId']?>" <?php if (!(strcmp($row_EditGroupsRecordset['GroupId'], htmlentities($row_EditCategoriesRecordset['GroupId'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_EditGroupsRecordset['GroupName']?></option>
        <?php
} while ($row_EditGroupsRecordset = mysql_fetch_assoc($EditGroupsRecordset));
?>
      </select>
      </td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="CategoryId" value="<?php echo $row_EditCategoriesRecordset['CategoryId']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($EditCategoriesRecordset);

mysql_free_result($EditGroupsRecordset);
?>
