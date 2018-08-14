<?php

	require 'db.php';

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



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?=$msg?><br><hr>
	<form action="signup.php" method="post">
		<p>
			<p><strong>Your login</strong></p>
			<input type="text" name="login" value="<?=$data['login']?>">

		</p>
		<p>
			<p><strong>Your email</strong></p>
			<input type="email" name="email" value="<?=$data['email']?>">

		</p>
		<p>
			<p ><strong>Password</strong></p>
			<input type="password" name="password">

		</p>
		<p>
			<p><strong>Password</strong></p>
			<input type="password" name="password_2">

		</p>
		<button type="submit" name="do_signup">Register now</button>
	</form><br><hr>
	<a href="index.php">Back</a>
</body>
</html>