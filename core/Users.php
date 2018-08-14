<?php 

namespace core;

use models\UserModel;

class Users


{
	public static function isAuth()
	{
	    $mUser = UserModel::Instance();
        $ver = $mUser->getPass($_COOKIE['login']);
		if(!isset($_SESSION['auth'])){
			if (isset($_COOKIE['login']) && isset($_COOKIE['verify']) && $_COOKIE['login'] == $ver['login'] && $_COOKIE['verify'] == $ver['Cookie']){
				$_SESSION['auth'] = true;
			}	
			else{
				return false;
			}	
		}
		return true;
	}
}