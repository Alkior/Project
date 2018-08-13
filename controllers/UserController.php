<?php

namespace Controllers;

use Core\Validator;
use models\UserModel;
use core\RND;
use core\Request;
use core\SQL;

class UserController extends BaseController
{
	public function loginAction()
	{
		$validator = new Validator();
		$mUser = UserModel::Instance();

		if ($this->request->isPost()) {
            $validator->loadRules('login_form');
            $validator->run($this->request->getPost());
            $auth = password_verify($validator->fields['password'], $mUser->getPass($validator->fields['login'])['password']);
			if ($validator->isValid) {
				if ($auth == true) {
            		$_SESSION['auth'] = true;

	            	// если стоит галочка                       
		            if (isset($this->request->getPost()['remember'])) {
		                setcookie('login', $validator->fields['login'], time()+3600*24*7, '/');
		                setcookie('password', password_hash($validator->fields['password'], PASSWORD_DEFAULT), time()+3600*24*7, '/');
		            }

					// Проверяем, что есть отметка, откуда мы пришли и перенаправляем туда
		            if (isset($_SESSION['back'])) {
		                $back = $_SESSION['back'];
		                header("Location: $back");  
		            }

		            $this->getRedirect('/');
	            }
			}			
    	}

		$this->content = RND::render('View/login.html.php', [
	                        'login' => $validator->fields['login'], 
	                        'password' => $validator->fields['password'],
	                        'errors' => $validator->errors
        				]);
		$this->title = 'Страница авторизации';
	}

	public function logoutAction()
	{
		unset($_SESSION['auth']);
	    setcookie('login', '', time() - 1);
	    setcookie('password', '', time() - 1);

	    $this->getRedirect('/');
	}

	public function regAction()
    {
        $mUser = UserModel::Instance();
        $validator = new Validator();

        if ($this->request->isPost()) {
            $validator->loadRules('signup_form');
            $validator->run($this->request->getPost());

            $mUser->addUser($validator->fields['login'], $validator->fields['email'], password_hash($validator->fields['password'], PASSWORD_DEFAULT));
            $this->getRedirect('/login');


        }
        $this->content = RND::render('view/signup.html.php', [
            'user' => $validator->fields['login'],
            'email' => $validator->fields['email'],
            'password' => $validator->fields['password'],
            'errors' => $validator->errors,
        ]);
        $this->title = 'Регистрация';

    }



}