<?php 
	require 'config.php';
		unset($_SESSION['auth']);
		//setcookie('login', $data['login'], time() - 1);
        //setcookie('password', password_hash($data['password']), time() - 1);
		header('Location: index.php');
		exit();