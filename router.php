<?php
    $url = parse_url($_SERVER['REQUEST_URI'])['path'];

    $routes = require('routes.php');

    function routeToController($url, $routes) {
        if(array_key_exists($url, $routes)) {
            require $routes[$url];
        } elseif (preg_match('#^/note\?id=\d+$#', $_SERVER['REQUEST_URI'])) {
            require $routes['/note/:id'];
        } else {
            abort();
        }
    }

    function abort($code = 404)  {
        http_response_code($code);
        require "views/{$code}.php";
        exit;
    }
?>
