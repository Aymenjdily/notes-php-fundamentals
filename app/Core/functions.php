<?php

function abort($code = \App\Core\Response::NOT_FOUND)
{
    http_response_code($code);
    require base_path('/views') . "/{$code}.php";
    exit;
}

function authorize($condition, $status = \App\Core\Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function config($key = null)
{
    static $config = null;

    if ($config === null) {
        $config = require base_path('/config.php');
    }

    if (is_array($config) && array_key_exists($key, $config)) {
        return $config[$key];
    }

    return $config;
}

function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function dd($var)
{
    dump($var);
    exit;
}
