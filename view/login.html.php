
<form method="post">
    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach($errors as $field => $text): ?>
                <p><?=$field?>:<?=$text?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>
Логин<br>
	<input type="text" name="login"><br>
	Пароль<br>
	<input type="text" name="password"><br>
	<input type="checkbox" name="remember" value="Yes">Запомнить меня
	<input type="submit" value="Войти" name="auth">
</form><br>

<a href="/">Back</a><br>
<a href="/reg">Sign up</a>
