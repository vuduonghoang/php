<?php
class MySQLProvider
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
	 

	function CloseConnection()
	{
		mysql_close($this->connect); 
	}
 }
?>