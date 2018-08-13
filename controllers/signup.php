<?php

	require 'config.php';

	$data = $_POST;
	if(isset($data['do_signup'])){
		//register there
		$errors = array();
		if(trim($data['login']) =='')
		{
			$errors[] = 'Введите логин!';
		}
		
		if(trim($data['email']) =='')
		{
			$errors[] = 'Введите почту!';
		}
		
		if($data['password'] =='')
		{
			$errors[] = 'Введите пароль!';
		}
		
		if($data['password_2'] != $data['password'])
		{
			$errors[] = 'Подтвердите пароль!';
		}

		if(R::count('users', "login = ?", array($data['login'])) > 0) 
		{
			$errors[] = 'Пользователь с таким именем уже существует.';
		}

		if(R::count('users', "email = ?", array($data['email'])) > 0) 
		{
			$errors[] = 'Пользователь с такой почтой уже существует.';
		}

		if(empty($errors)){
			//all right, register
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			$msg = '<div style="color: green;">Вы успешно зарегистрированы!</div>';
		}
		else{
			$msg = '<div style="color: red;">' . array_shift($errors) . '</div>';
		}
	}


	$content = render('view/v_signup.php', [
		'data' => $data,		
		'msg' => $msg, 
	]);

	$html = render('main_index.php', [
		'title' => 'Форма регистрации',
		'content' => $content
	]);

	echo $html;