<?php

namespace Models;

use core\SQL;
use core\DBerror;

class UserModel extends BaseModel
{
    public static $instance;

    public static function Instance()
    {
        if(self::$instance == null) {
            self::$instance = new UserModel();
        }
        return self::$instance;
    } 

    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
        $this->pk = 'id_user';
        $this->dt = 'dt_reg';
    }
    /**
    *Класс, предназначенный для операций записи, редактирования и удаления учетной записи в БД.
    */

    public function authUser($login, $password)
    {
        $res = $this->db->query("SELECT * FROM {$this->table} WHERE login = '$login' AND password = '$password'");
        if(!$res){
            return false;
        }
        else{
            return $res[0];
        }
    }

    public function addUser($login, $email, $password)
    {			
		$object = ['login' => $login, 'email' => $email, 'password' => $password];
		$res = SQL::Instance();
		$article = $res->instance($this->table, $object);

		if(!$res){
            return false;
        }
        else{
            return $article;
        }
    }
    /**
    *
    */    
    
    public function updatePassword($login, $password, $id)
    {
		$masq = ['password' => $password];
		$query = $this->db->prepare("UPDATE {$this->table} SET password =:password WHERE {$this->pk}='$id', login = '$login', password = '$password'");	 			
		$query->execute($masq);
		if(!$res){
			DBerror::db_error_log($query);
		}
 		return $squery->fetch();	
    }
    /**
    *
    */
    public function delUser($id, $login, $password)
    {
    	$res = $this->db->query("DELETE FROM {$this->table} WHERE {$this->pk} = '$id', login = '$login', password = '$password'");
        $query->execute();
        if(!$res){
			DBerror::db_error_log($query);
		}    
    	return $query->fetch();
    }

    public function getLogin($login)
    {
        $res = $this->db->query("SELECT * FROM {$this->table} WHERE login = '$login'");
    }
}