<?php

namespace App\PHPRouter;

use App\PHPRouter\Route\Route;
use App\PHPRouter\Route\RouteDispatcher;

class App {
    public static function run () {
        foreach (Route::getRoutesGet() as $routeConfig) {
            $routeDispatcher = new RouteDispatcher($routeConfig);
            $routeDispatcher->process();
        }
    }
}