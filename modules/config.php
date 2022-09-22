<?php
define("HOST", "localhost");
define("DB", "db_furniture");
define("USER", "root");
define("PASSWORD", "");

//Lấy hosing hiện tại
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $path = "https://";
} else {
    $path = "http://";
}
$path .= $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', $path);
define('IMAGE', URLROOT . '/public/img');
define('JSFILE', URLROOT . '/public/js');
define('CSSFILE', URLROOT . '/public/css');
