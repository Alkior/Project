	<br><hr>
	<form method="post">
		<p>
			<p><strong>Your login</strong></p>
			<input type="text" name="login" value="<?=$user['login']?>">

		</p>
		<p>
			<p><strong>Your email</strong></p>
			<input type="email" name="email" value="<?=$user['email']?>">

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
