<?php
class DataProvider
{
    var $servername = "localhost";
    var $username = "root";
    var $password="";
    var $databasename="MarketoHome";
   function get_servername()
   {
         return $this->servername;
    }
   function set_servername($value)
   {
         $this->servername=$value;
   }
    function get_username()
   {
         return $this->username;
    }
   function set_username($value)
   {
         $this->username=$value;
   }
    function get_password()
   {
         return $this->password;
    }
   function set_password($value)
   {
         $this->password=$value;
   }
   function get_databasename()
   {
         return $this->databasename;
    }
   function set_databasename($value)
   {
         $this->databasename=$value;
   }
   function GetConnection()
    {
   		$connect = mysql_connect($this->servername, $this->username, $this->password);
   	 	if (!$connect) {
			die('Could not connect MySQL: ' . mysql_error());
    	}
    	return $connect;
    }
	var $connect = null;
    function GetResultSet( $select)
    {
		$this->connect=$this->GetConnection();
		mysql_select_db ($this->databasename, $this->connect);
		mysql_query("SET NAMES 'utf8'");
		$result = mysql_query($select, $this->connect);
 		return $result;
    }
    function InsertSQL( $insert)
    {
		$this->connect=$this->GetConnection();
		mysql_select_db ($this->databasename, $this->connect);
		mysql_query("SET NAMES 'utf8'");
		$result = mysql_query($insert, $this->connect);
 		return $result;
    }
   function InsertTable( $table, $column, $value)
    {
		$this->connect=$this->GetConnection();
		mysql_select_db ($this->databasename, $this->connect);
		mysql_query("SET NAMES 'utf8'");
		$insert = "insert into ".$table. "(";
		for($i=0; $i<count($column); $i++)
		{
			$insert.= $column[$i]. ",";
		}
		$insert=substr($insert,0,strlen($insert)-1);
		$insert.= ")values('";
		for($i=0; $i<count($value); $i++)
		{
			$insert.= $value [$i]. "','";
		}
		$insert=substr($insert,0,strlen($insert)-2);
		$insert.= ")";

		$result = mysql_query($insert, $this->connect);
 		return $result;
    }
function UpdateSQL( $update)
    {
		$this->connect=$this->GetConnection();
		mysql_select_db ($this->databasename, $this->connect);
		mysql_query("SET NAMES 'utf8'");
		$result = mysql_query($update, $this->connect);
 		return $result;
    }
 function UpdateTable( $table, $column, $value,$wherecolumn, $wherevalue)
    {
		$this->connect=$this->GetConnection();
		mysql_select_db ($this->databasename, $this->connect);
		mysql_query("SET NAMES 'utf8'");
		$update = "update ".$table. " set ";
		for($i=0; $i<count($column); $i++)
		{
		   $update.= $column[$i]. "='". $value [$i]."',";
		}
		$update=substr($update,0,strlen($update)-1);
		$update.= " where ".$wherecolumn."='".$wherevalue."'";
		 
		$result = mysql_query($update, $this->connect);
 		return $result;
    }
function DeleteSQL( $delete)
    {
		$this->connect=$this->GetConnection();
		mysql_select_db ($this->databasename, $this->connect);
		mysql_query("SET NAMES 'utf8'");
		$result = mysql_query($delete, $this->connect);
 		return $result;
    }
 function DeleteTable( $table, $wherecolumn, $wherevalue)
    {
		$this->connect=$this->GetConnection();
		mysql_select_db ($this->databasename, $this->connect);
		mysql_query("SET NAMES 'utf8'");
		$delete = "delete from ".$table;
		$delete.= " where ".$wherecolumn."='".$wherevalue."'";
		 
		$result = mysql_query($delete, $this->connect);
 		return $result;
    }
	function CloseConnection()
	{
		mysql_close($this->connect); 
	}
 }
?>