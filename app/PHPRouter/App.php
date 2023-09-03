<?php

namespace App\PHPRouter;

use App\PHPRouter\Route\Route;
use App\PHPRouter\Route\RouteDispatcher;

class App {
    public static function run () {
        $requestMethod = ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
        $methodName = 'getRoutes'.$requestMethod;

        foreach (Route::$methodName() as $routeConfig) {
            $routeDispatcher = new RouteDispatcher($routeConfig);
            $routeDispatcher->process();
        }
    }
}