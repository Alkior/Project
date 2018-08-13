
<div class="container mx-lg-2">
	<form method="post">
		Title <br>
		<input type="text" name="title" value="<?=$title?>"><br>
		File content <br>
		<textarea name="content" cols="20" rows="10"><?=$content?></textarea><br>
		<input type="submit" name="Submit"><br>

	</form>
</div>
<div class="container mx-lg-2">
	<? if($errors != ''): ?>
        <? foreach($errors as $error): ?>
            <div class="danger">
            	<span><?=$error ?></span>
            </div>
        <? endforeach; ?>
    <? endif; ?><br>
	<a href="../"><button>Back</button></a><br><hr>
</div>
