<?php

namespace Core;

include_once('settings.php');

class SQL{
	private static $instance;
	private $db;
	
	public static function Instance(){
		if(self::$instance == null){
			self::$instance = new SQL();
		}
		
		return self::$instance;
	}
	
	private function __construct(){
		setlocale(LC_ALL, 'ru_RU.UTF8');	
		$this->db = new \PDO(DBMS . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
		$this->db->exec('SET NAMES UTF8');
		$this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
	}
	
	public function query($query){
		$q = $this->db->prepare($query);
		$q->execute();
		
		if($q->errorCode() != \PDO::ERR_NONE){
			DBerror::dbErrorLog($q);
			die();
		}
			
		return $q->fetchAll();					
	}
						// article   [ title => 'ddd', content => ]
	public function insert($table , $object){
		$columns = array();
		$masks = array();
		
		foreach($object as $key => $value){

			$columns[] = $key;
			// ':title', ':content'
			$masks[] = ":$key";
			
			if($value === null){
				$object[$key] = 'NULL';
			}
		}

		//  title,content
		$columns_s = implode(',', $columns);
		//  :title,:content
		$masks_s = implode(',', $masks);
		// INSERT INTO article (title,content) VALUES(:title,:content)
		$query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";
		$q = $this->db->prepare($query);
		$q->execute($object);
		
		if($q->errorCode() != \PDO::ERR_NONE){
			DBerror::dbErrorLog($q);
			die();
		}
		
		return $this->db->lastInsertId();		
	}
		// $obj = [ title => 'ddd', content => 'ttt'] $where = 'title = 'aaa''
	public function update($table, $object, $where){
		$sets = array();
		 
		foreach($object as $key => $value){
			
			// title=:title
			// content=:content
			$sets[] = "$key=:$key";
			
			if($value === NULL){
				$object[$key]='NULL';
			}
		 }
		 
		 // title=:title,content=:content
		$sets_s = implode(',',$sets);
		// UPDATE article SET title=:title,content=:content WHERE name = 'Andrey'
		$query = "UPDATE $table SET $sets_s WHERE $where";

		$q = $this->db->prepare($query);
		$q->execute($object);

		if($q->errorCode() != \PDO::ERR_NONE){
			DBerror::dbErrorLog($q);
			die();
		}
		
		return $q->rowCount();
	}
	
	public function delete($table, $where){
		$query = "DELETE FROM $table WHERE $where";
		$q = $this->db->prepare($query);
		$q->execute();
		
		if($q->errorCode() != \PDO::ERR_NONE){
			DBerror::dbErrorLog($q);
			die();
		}
		
		return $q->rowCount();
	}
}
?>