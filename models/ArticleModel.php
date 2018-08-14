<?php 

namespace Models;

use core\SQL;


class ArticleModel extends BaseModel
{  
/**
    *Класс, предназначенный для операций записи, редактирования и удаления в БД.
    */
    
    public static $instance;

    public static function Instance()
    {
        if(self::$instance == null) {
            self::$instance = new ArticleModel();
        }
        return self::$instance;
    } 

    public function __construct()
    {
        parent::__construct();
        $this->table = 'blogs';
        $this->pk = 'id_blog'; 
        $this->dt = 'dtpost';

    }  
         
    /**
    *
    */
    public function searchTitle($title)
    {       
       $res = $this->db->query("SELECT * FROM {$this->table} WHERE title = '$title'");
        if(!$res){           
            return false;         
        }
        else{
        return $res[0];
        } 
    }
    /**
    *
    */
    public function getTitle($title, $id)
    {    	
    	$res = $this->db->query("SELECT * FROM {$this->table} WHERE title = '$title' AND {$this->pk} != '$id'");
    	if(!$res){
            return false;          
        }
        else{
    	return $res[0];
        }
    }
    /**
    *
    */
    public function updateM($title, $content, $id)
    {
        
        	$object = ['title' => $title, 'content' => $content];
            $where = $this->pk . '=' . $id;
        		
        	$res = SQL::Instance();
            $res->update($this->table, $object, $where);
        	if(!$res){
                return false;
            }
            else{
                return $res;
            } 
                
    	
    }
    /**
    *новая запись
    */
    public function write($title, $content)
    {   
        
  
            $object = ['title' => $title,'content'=> $content];
            $res = SQL::Instance();
            $article = $res->insert($this->table, $object);
            if(!$res){
                return false;           
            }
            else{                
                return $article;
            }         
       
    }
    /**
    * Валидация полей
    */
    public function isValidate($title, $content)
    {
        $errors = [];
        if($title == ''){
            $errors['tit'] = 'Поле не должно быть пустым!';
        }
        elseif(mb_strlen($title) < 5){
            $errors['tit'] = 'Слишком короткое название!';
        }
        elseif(mb_strlen($title) > 150){
            $errors['tit'] = 'Слишком длинное название!';
        }
        elseif($this->searchTitle($title) != 0){
            $errors['tit'] = 'Такое имя статьи уже существует!';
        }
        if($content == ''){
            $errors['cont'] = 'Поле должно быть заполнено!';
        }
        elseif(mb_strlen($content) < 5){
            $errors['cont'] = 'Ваше сообщение не может быть таким коротким!';
        }
        elseif (mb_strlen($content) > 65535) {
            $errors['cont'] = 'Ваше сообщение слишком длинное!';
        }
        return $errors;
        }

    public function updateValid($title, $content, $id)
    {
        $errors = [];
        if($title == ''){
            $errors['tit'] = 'Поле не должно быть пустым!';
        }
        elseif(mb_strlen($title) < 5){
            $errors['tit'] = 'Слишком короткое название!';
        }
        elseif(mb_strlen($title) > 150){
            $errors['tit'] = 'Слишком длинное название!';
        }  
        if($content == ''){
            $errors['cont'] = 'Поле должно быть заполнено!'; 
        }     
        elseif(mb_strlen($content) < 5){
            $errors['cont'] = 'Ваше сообщение не может быть таким коротким!';
        }
        elseif (mb_strlen($content) > 65535) {
            $errors['cont'] = 'Ваше сообщение слишком длинное!';
        }
        if($this->getTitle($title, $id) != false){
            $errors['tit'] = 'Статья с таким именем уже существует!';
        }
        return $errors;
    }


}
