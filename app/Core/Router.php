<?php

namespace App\Core;

class Router
{
    protected $routes = [];

    public function register(array $routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri)
    {
        $path = parse_url($uri)['path'] ?? '/';

        // 1. Exact match
        if (array_key_exists($path, $this->routes)) {
            require base_path('/' . $this->routes[$path]);
            return;
        }

        // 2. Wildcard match, e.g. /note/edit/:id
        foreach ($this->routes as $pattern => $controller) {
            $matches = $this->matchWildcard($pattern, $path);

            if (! empty($matches)) {
                foreach ($matches as $param => $value) {
                    $_GET[$param] = $value;
                }

                require base_path('/' . $controller);
                return;
            }
        }

        abort();
    }

    protected function matchWildcard($pattern, $path)
    {
        // No wildcard in this route, skip
        if (! str_contains($pattern, ':')) {
            return [];
        }

        preg_match_all('/:([a-zA-Z_]+)/', $pattern, $names);

        // :id stays strictly numeric, every other param matches a segment
        $regex = str_replace(':id', '(\d+)', $pattern);
        $regex = preg_replace('/:([a-zA-Z_]+)/', '([^/]+)', $regex);

        if (! preg_match('#^' . $regex . '$#', $path, $values)) {
            return [];
        }

        array_shift($values);

        return array_combine($names[1], $values);
    }

    public static function abort($code = Response::NOT_FOUND)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        exit;
    }
}
