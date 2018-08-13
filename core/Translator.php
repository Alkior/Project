<?php

namespace core;

class Translator
{
	private $map;

	public function __construct()
	{
		$this->map = include_once ROOT . '/Core/Config/TranslationMap.php';
	}

	public function getTranslate($pattern, $lang)
	{
		return $this->map[$pattern][$lang];
	}
}