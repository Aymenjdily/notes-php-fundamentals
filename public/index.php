<?php

    require __DIR__ . '/../app/bootstrap.php';

    $router = new App\Core\Router();

    $router->register(require base_path('/routes.php'));

    $router->direct($_SERVER['REQUEST_URI']);

?>
