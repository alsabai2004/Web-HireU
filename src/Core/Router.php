<?php
namespace WebHireU\Core;

final class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function dispatch(string $method, string $path): void
    {
        $handler = $this->routes[$method][$path] ?? null;

        if (!$handler) {
            Response::text('404 - Page Not Found', 404);
            return;
        }

        $result = $handler();

        if (is_string($result)) {
            Response::text($result);
        }
    }
}
