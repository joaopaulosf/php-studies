<?php

namespace Core\Middleware;
use http\Exception;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key): void
    {
        if(!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if(!$middleware) throw new \Exception('No matching middleware found for key ' . $key . '.');

        (new $middleware)->handle();
    }
}