<?php

use Core\Response;
use JetBrains\PhpStorm\NoReturn;

function dd($value) // 'display dump'
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

#[NoReturn] function abort(int $code = 404): void
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorized($condition): void
{
    if (!$condition) {
        abort(Response::FORBIDDEN);
    }
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = []): void
{
    extract($attributes);

    require base_path('views/' . $path);
}

function login($user): void
{
    $_SESSION['user'] = [
        'username' => $user['username'],
        'email' => $user['email']
    ];
}