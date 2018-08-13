<?php
	include_once('config.php');

	$app = new core\App(new core\Request($_GET, $_POST, $_SERVER));	
	
	$app->go();



