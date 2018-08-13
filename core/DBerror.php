<?php 
namespace core;

class DBerror
{
	public static function dbErrorLog($query)
	{
		$info = $query->errorInfo();
		$log = '|' . date("Y-m-d H:i:s") . '|'.implode('|', $info);
		$log = $log . "\n----------------------------------------\n";
        file_put_contents('errors/error.log', $log, FILE_APPEND);       
	}
}