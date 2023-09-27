<?php

define("DS", DIRECTORY_SEPARATOR);
define("ROOT_PATH", dirname(dirname(__DIR__)) . DS);
define("APP", ROOT_PATH . 'App' . DS);
define("SRC", ROOT_PATH . 'src' . DS);
define("SUPPORT", SRC . 'support' . DS);
define("CONFIG", ROOT_PATH . 'config' . DS);
define("CONTROLLERS", APP . 'Controllers' . DS);
define("MODELS", APP . 'Models' . DS);
define("VIEWS", ROOT_PATH . 'views' . DS);
define('BURL', 'http://localhost:9000/');


if (!function_exists('controllers_path')) {
    function controllers_path()
    {
        return 'App\Controllers\\';
    }
}

if (!function_exists('base_path')) {
    function base_path()
    {
        return dirname(__DIR__) . '/../';
    }
}

if (!function_exists('url')) {
    function url($url = ''){
        echo BURL.$url;
    }
}
