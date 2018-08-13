<div class="form container mx-lg-2">
	<span><?=$errors['tit']?></span><br>
	<span><?=$errors['cont']?></span><br>
	<form method="post">
		
		Title <br>
		<input type="text" name="title" value="<?=$article['title']?>"><br>
		File content <br>
		<textarea name="content" cols="30" rows="20"><?=$article['content']?></textarea><br>
		
		<input type="submit" name="Submit"><br>
	</form><br>			
</div>	
	
<div class="href">
	<a href="/login"><button type="button">Logout</button></a>
	<a href="../"><button type="button">Main page</button></a><br><hr>
	<a href="/del?id_blog=<?=$article['id_blog']?>"><button type="button">Delete</button></a>
</div>
