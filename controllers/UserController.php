<?php

namespace Controllers;

use Core\Validator;
use Models\UserModel;
use core\RND;
use core\Request;

class UserController extends BaseController
{
	public function loginAction()
	{
		$validator = new Validator();
		$validator->loadRules('login_form');

		if ($this->request->isPost()) {

			$validator->run($this->request->getPost());
			
			if ($validator->isValid) {
				if ($validator->fields['login'] == 'admin' && $validator->fields['password'] == 'qwerty') {
            		$_SESSION['auth'] = true;

	            	// если стоит галочка                       
		            if (isset($this->request->getPost()['remember'])) {
		                setcookie('login', $login, time()+3600*24*7, '/');
		                setcookie('password', md5($password), time()+3600*24*7, '/');
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
        $validator->loadRules('signup_form');


        if($this->request->isPost())
        {

                $user = $mUser->newUser(htmlspecialchars($this->request->getPost()['login']), htmlspecialchars($this->request->getPost()['password']), htmlspecialchars($this->request->getPost()['email']));
                $this->getRedirect('/login');
        }
        $this->content = RND::render('view/signup.html.php', [
            'user' => $user,
            'errors' => $validator->errors,
        ]);
        $this->title = 'Регистрация';
    }

}