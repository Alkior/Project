<?php

namespace Services;

use Controllers\ArticleController;
use Controllers\BaseController;
use Models\ArticleModel;

class HTMLGenerator
{
	const END_LINE = "\n";
	public $beautyText;	
	private $text;

	public function __construct($text)
	{
		$this->text = $text;		
	}

	public function addTextToTop($text)
	{
		$this->beautyText = $text . $this->beautyText;
		return $this;
	}

	public function addTo($html, $tagName, $number = null, $where = 0)
	{
		$tags = $this->findByTag($tagName, $number);

		if(is_array($tags[$where])){
			foreach ($tags[$where] as $line) {
				$this->beautyText = str_replace($line, $html . $line, $this->beautyText);
			}
		}
		else{
			$this->beautyText = str_replace($tags[$where], $html . $tags[$where], $this->beautyText);
		}	

		return $this;
	}

	public function findByTag($tag, $pos = null)
	{
		preg_match_all("#<$tag*>(.*?)</$tag>#", $this->beautyText, $match); //"#<$tag*>(.*?)</$tag>#" - является регулярным выражением. 

		if(isset($pos) && $pos > 0){
			$match[0] = $match[0][$pos - 1];
			$match[1] = $match[1][$pos - 1];
		}		
		return $match;
	}

	public static function getTitle($text, $level = '1')
	{
		return "<h$level>$text</h$level>";
	}

	public static function getImg($path, $title = '')
	{
		return "<img src=\"$path\" alt=\"$title\">";
	}

	public function wrapEachInP()
	{
		$arr = $this->explodeText($this->beautyText);
		$t = '';
		foreach ($arr as $p) {
			$t .= "<p>$p</p>";		
		}
		$this->beautyText = $t;
		return $this;	
	}

	public function wrapAllInBox($class = '')
	{
		$class = $class ==='' ? '' : "class='$class'";
		/*Верхняя строчка с тернарным оператором эквивалент записи:
		if($class === ''){  - где if = ?
			$class = '';
		}
		else{               - где else = :
			$class = "class='$class'";
		}

		*/
 		$this->beautyText = "<div $class>{$this->beautyText}</div>";
		return $this;
	}

	private function explodeText($text)
	{
		$_text = explode("\n", $this->text);
		$res = [];
		foreach ($_text as $p) {
			if($p!=''){
				$res[] = $p;
			}		
		}
		return $res;
	}
	
}