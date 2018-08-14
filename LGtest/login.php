<?php

	require 'db.php';

	$data = $_POST;
	if(isset($data['do_login']) ){
		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login']) );
		if( $user ){
			//login enable
			if( password_verify($data['password'], $user->password) ){

			}
			else {
				$errors[] = 'Неверный пароль';
			}
		
		}
		else{
			$errors[] = 'Такой пользователь не найден';
		}

		if( ! empty($errors) ){
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
	<?=$msg?>
	<form action="login.php" method="post">
		<p>
			<p><strong>Login</strong></p>
			<input type="text" name="login" value="<?=$data['login']?>">
		</p>		
		<p>
			<p ><strong>Password</strong></p>
			<input type="password" name="password">
		</p><br><hr>
		<button type="submit" name="do_login">Login</button>
	</form>
</body>
</html>