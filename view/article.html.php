<br><hr>

    <div class="container mx-lg-2">
        <h1><strong><?=$article['title']?></strong></h1>
        <span><?=$article['dtpost']?></span>
        <div><?=$article['content']?></div><hr><br>
    </div>

<div class="container mx-lg-2">
    <?=$change?><br>
    <a href="../"><button>Назад</button></a><br>
    <a href="/edit/<?=$article['id_blog']?>">Edit</a><br><hr>
    <?=$delButt;?><br><hr>
</div>