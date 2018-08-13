<?php
namespace models;

use core\SQL;
use core\DBerror;

abstract class BaseModel
{
	protected $db;
	protected $table;
	protected $pk;
	protected $dt;

	public function __construct()
	{
		$this->db = SQL::Instance();
	}	

	public function all()
	{
		return $this->db->query("SELECT * FROM {$this->table} ORDER BY {$this->dt} DESC");
		
	}

	public function get($id)
	{
		$res = $this->db->query("SELECT * FROM {$this->table} WHERE {$this->pk} = '$id'");	
		if(!$res){
			DBerror::db_error_log($res);
			return false;		
		}
		else{			
			return $res[0];
		}
	}

	public function del($id)
	{
		
		$res = SQL::Instance();
		$res->delete($this->table, $this->pk .'='. $id);

		if(!$res){
			DBerror::db_error_log($res);		
		}
		else{			
			return $res;
		}
	}	
}