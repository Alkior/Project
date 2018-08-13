	<br><hr><h1>Регистрация пользователя</h1>
	<form method="post">
		<p>
			<p><strong>Your login</strong></p>
			<input type="text" name="login" value="<?=$validator->fields['login']?>">

		</p>
		<p>
			<p><strong>Your email</strong></p>
			<input type="email" name="email" value="<?=$validator->fields['email']?>">

		</p>
		<p>
			<p ><strong>Password</strong></p>
			<input type="password" name="password">

		</p>
		<p>
			<p><strong>Password</strong></p>
			<input type="password" name="password_2">

		</p>
		<button type="submit" name="do_signup">Регистрация!</button>
	</form><br><hr>
	<a href="/">Back</a>
