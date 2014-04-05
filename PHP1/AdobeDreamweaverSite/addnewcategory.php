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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO categories (CategoryId, CategoryName, GroupId) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['CategoryId'], "int"),
                       GetSQLValueString($_POST['CategoryName'], "text"),
                       GetSQLValueString($_POST['GroupId'], "int"));

  mysql_select_db($database_MarketoHome, $MarketoHome);
  $Result1 = mysql_query($insertSQL, $MarketoHome) or die(mysql_error());

  $insertGoTo = "categories.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_MarketoHome, $MarketoHome);
$query_ViewGroupsRecordset = "SELECT * FROM groups";
$ViewGroupsRecordset = mysql_query($query_ViewGroupsRecordset, $MarketoHome) or die(mysql_error());
$row_ViewGroupsRecordset = mysql_fetch_assoc($ViewGroupsRecordset);
$totalRows_ViewGroupsRecordset = mysql_num_rows($ViewGroupsRecordset);
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
      <td><input type="text" name="CategoryId" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">CategoryName:</td>
      <td><input type="text" name="CategoryName" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">GroupId:</td>
      <td><select name="GroupId">
        <?php 
do {  
?>
        <option value="<?php echo $row_ViewGroupsRecordset['GroupId']?>" ><?php echo $row_ViewGroupsRecordset['GroupName']?></option>
        <?php
} while ($row_ViewGroupsRecordset = mysql_fetch_assoc($ViewGroupsRecordset));
?>
      </select>
      </td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($ViewGroupsRecordset);
?>
