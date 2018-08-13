<?php

namespace Core;

use controllers\ArticleController;
use controllers\PageController;

/**
 * Identify controller or action, and return it name.
 */
class App
{
	
	protected $request;
	protected $routs;
	
	

	public function __construct(Request $request)
	{
		$this->request = $request;
		$this->routs = include_once ROOT . '/Core/Config/RoutingMap.php';		
	}

	public function go()
	{
		$params = $this->getRoutByRequest();

		if ($params === false){
			$params = $this->getRoutByParams('/default');
		}
		$ctrl = new $params['controller']($this->request);
		$action = $params['action'];

		$ctrl->$action();
		$ctrl->template();

	}

	private function getRoutByRequest()
	{
		$routKit = explode('/', $this->request->rout);
		$routParams = false;
		foreach ($routKit as $num => $item) {
			if(is_numeric($item)){
				$routParams = $item;
				$item = 'int';
			}

			$routKit[$num] = $item;
		}

		if(!$routParams){
			return isset($this->routs[$this->request->rout]) ? $this->routs[$this->request->rout] : false;
		}

		$routPattern = implode('/', $routKit);
		$routPatterns = [];
		foreach ($this->routs as $key => $value) {
			if (stripos($key, 'int')){
				$routPatterns[] = $key;
			}
		}

		if (!in_array($routPattern, $routPatterns)) {
			return false;
		}

		$params = $this->routs[$routPattern];
		$this->request->setGet($params['params']['int'], $routParams);

		return $params;
	}

	private function getRoutByParams($rout)
	{
		return isset($this->routs[$rout]) ? $this->routs[$rout] : false;
	}

}