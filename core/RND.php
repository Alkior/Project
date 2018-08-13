<?php 

namespace core;


class RND
{
	public static function render($filename, $values = array())
	{
		ob_start();
		extract($values);// превращает массив в переменные с названием их как ключи массива, аналог foreach		
		include ($filename);
		return ob_get_clean();
	}
}