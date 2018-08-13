<?php
    session_start();
    /*
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1); */

    include_once('settings.php');

    function __autoload($name)
    {
    	include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.' . 'php';
    }

    $_SESSION['back'] = $_SERVER['REQUEST_URI'];

