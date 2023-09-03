<?php

namespace App\PHPRouter\Route;

class RouteConfiguration {
    public string $route;
    public string $controller;
    public string $action;
    private string $name;
    private string $middleware;

    public function __construct(string $route, string $controller, string $action) {
        $this->route = $route;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function name(string $name) : self {
        $this->name = $name;

        return $this;
    }
}