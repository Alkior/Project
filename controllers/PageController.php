<?php

namespace Controllers;

use core\RND;

class PageController extends BaseController
{
	public function aboutAction()
	{
		echo RND::render('View/about_page.html.php');
	}

	
}