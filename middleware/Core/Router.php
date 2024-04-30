<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected array $routes = [];

    public function add(string $method, string $uri, string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get(string $uri, string $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function delete(string $uri, string $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function post(string $uri, string $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function put(string $uri, string $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function patch(string $uri, string $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function abort(int $code = 404): void
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route(string $uri, string $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);

                require base_path('Http/controllers/' . $route['controller']);
                exit();
            }
        };

        $this->abort();
    }
}