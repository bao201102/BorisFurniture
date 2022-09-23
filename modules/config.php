<?php
define("HOST", "localhost");
define("DB", "db_furniture");
define("USER", "root");
define("PASSWORD", "");

//Lấy hosing hiện tại

if ('443' == $_SERVER['SERVER_PORT']) {
    $path = "https://";
} 
elseif (isset($_SERVER['SERVER_PORT'])) {
    $path = "http://";
}

// if (!empty($_SERVER['HTTPS'])) {
//     $path = "https://";
// } else {
//     $path = "http://";
// }

if (strlen(dirname($_SERVER['PHP_SELF'])) > 1) {
    $selfpath = dirname($_SERVER['PHP_SELF']);
} else {
    $selfpath = '';
}
$path .= $_SERVER['HTTP_HOST'] . $selfpath;

define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', $path);
define('IMAGE', URLROOT . '/public/img');
define('JSFILE', URLROOT . '/public/js');
define('CSSFILE', URLROOT . '/public/css');