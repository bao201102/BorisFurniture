<?php
define("HOST", "localhost");
define("DB", "db_furniture");
define("USER", "root");
define("PASSWORD", "");

//Lấy hosing hiện tại
if (!empty($_SERVER['HTTPS'])) {
    $path = "https://";
} else {
    $path = "http://";
}

if (strlen(dirname($_SERVER['PHP_SELF'])) > 1) {
    $selfpath = dirname($_SERVER['PHP_SELF']);
}
else {
    $selfpath = '';
}
$path .= $_SERVER['HTTP_HOST'].$selfpath;

echo $path;

define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', $path);
define('IMAGE', URLROOT . '/public/img');
define('JSFILE', URLROOT . '/public/js');
define('CSSFILE', URLROOT . '/public/css');