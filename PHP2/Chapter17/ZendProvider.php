<?php
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';
class ZendProvider
{
	var $db = null;
	function __construct()
	{
		$this->db = Zend_Db::factory('Pdo_Mysql', 
		array(
			'host'     => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname'   => 'marketohome'));
		$this->db->query("SET NAMES 'utf8'");
	}
	function FetchRows($sql)
	{
		$this->db->setFetchMode(Zend_Db::FETCH_NUM);
		$result =$this->db->fetchAll($sql);
		return $result;
	}
	function FetchObjects($sql)
	{
		$this->db->setFetchMode(Zend_Db::FETCH_OBJ);
		$result =$this->db->fetchPairs($sql);
		return $result;
	}
	function FetchRowsPaging($table, $columns)
	{
		require_once 'Zend/Loader/Autoloader.php';
		$loader = Zend_Loader_Autoloader::getInstance();
		$this->db->setFetchMode(Zend_Db::FETCH_NUM);
		$result = new Zend_Paginator
		(
			new Zend_Paginator_Adapter_DbSelect
			(
				$this->db->select()->from($table, $columns) 
				 
			)
	  	);
		return $result;
	}
	function FetchRowsPagingWhere($table, $columns, $where)
	{
		require_once 'Zend/Loader/Autoloader.php';
		$loader = Zend_Loader_Autoloader::getInstance();
		$this->db->setFetchMode(Zend_Db::FETCH_NUM);
		$result = new Zend_Paginator
		(
			new Zend_Paginator_Adapter_DbSelect
			(
				$this->db->select()->from($table, $columns)
				->where($where,"")
				 
			)
	  	);
		return $result;
	}
	 
	function Insert($table, $data )
	{
		$this->db->insert($table, $data);  
	}
	function Update($table, $data, $where)
	{
		$this->db->update($table, $data,$where);  
	}
	function Delete($table, $where )
	{
		$this->db->delete($table,  $where);
	}
}
?>

