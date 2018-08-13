<?php 
namespace Controllers;

use core\Users;
use core\RND;
use core\Request;

/**
* Родительский класс контроллер, с которого пойдет наследование.
*/
class BaseController
{

	
	protected $title;
	protected $content;
	protected $auth;
	protected $request;
	protected $errors;

	public function __construct(Request $request)
	{
		$this->title = $title;
		$this->auth = Users::isAuth();
		$this->request = $request;
	}

	public function __call($name, $params)
	{
		$pageCtrl = new PageController($this->request);
		$pageCtrl->pageNotFoundAction();
		
	}

	public function template()
	{
		echo RND::render('view/main_index.php', [
				'title' => $this->title,
				'auth' => $this->auth,
				'content' =>$this->content
		]);
	}

	protected function getRedirect($url)
	{
		header("Location: $url");
		die;
	}
	
	public function Page404()
	{
		header('HTTP/1.1 404 Page Not Found');
		$this->title = "{$this->title}::404 error";
		$this->content = RND::render('view/404_page.html.php');	
		$this->template();
		die;
	}

}