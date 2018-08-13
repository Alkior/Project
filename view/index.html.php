
<div class="container">
	
        <span><a href="/logout">Разлогиниться</a></span><br>
        <span>Привет <?php echo $_SESSION['auth']->login; ?></span><br>        
        <a href="/add"><button style="background: #056CA1; margin: 5px; color: #f0f0f0;">Добавить новость</button></a><br>
    
        <a href="/signup"><button style="background: #056CA1; margin: 5px; color: #f0f0f0;">Регистрация</button></a><br>
            
</div>
    <div class="container">
    <?php foreach($article as $one):?>
        <div class="item">
            <span><?=$one['dtpost']?></span>
            <strong><a href="/article/<?=$one['id_blog']?>"><?=$one['title']?></a></strong>
            <div><?=$one['content']?></div>
        </div>
        <hr>
    <? endforeach ?>        
</div>
