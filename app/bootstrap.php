<?php

define('BASE_PATH', dirname(__DIR__));

spl_autoload_register(function ($class) {
    if (! str_starts_with($class, 'App\\')) {
        return;
    }

    require base_path('/app') . str_replace('\\', '/', substr($class, strlen('App'))) . '.php';
});

require __DIR__ . '/Core/functions.php';
