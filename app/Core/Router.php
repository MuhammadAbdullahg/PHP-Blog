<?php
namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $uri, array $action, ?string $middleware = null): void {
        $this->routes["GET"][$uri] = ["action" => $action, "middleware" => $middleware];
    }
    public function post(string $uri, array $action, ?string $middleware = null): void {
        $this->routes["POST"][$uri] = ["action" => $action, "middleware" => $middleware];
    }

    public function route(string $method, string $uri):void {
        $route = $this->routes[$method][$uri] ?? null;

        if(!$route) {
            http_response_code(404);
            die("Page not found");
        }

        if($route['middleware']) {
            $middlewareClass = $route['middleware'];
            (new $middlewareClass)->handle();
        }

        [$controllerClass, $controllerMethod] = $route['action'];
        $controller = new $controllerClass();
        $controller->$controllerMethod();
    }
}