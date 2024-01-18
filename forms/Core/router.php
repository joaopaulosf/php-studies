<?php

use JetBrains\PhpStorm\NoReturn;

function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    };
}

#[NoReturn] function abort(int $code = 404): void
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = require base_path('routes.php');

routeToController($uri, $routes);