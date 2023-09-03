<?php

namespace App\PHPRouter\Route;

class RouteDispatcher
{

    private string $requestURI = '/';

    private array $paramMap = [];

    private array $paramRequestMap = [];
    private RouteConfiguration $routeConfig;

    /**
     * @param RouteConfiguration $routeConfig
     */
    public function __construct(RouteConfiguration $routeConfig)
    {
        $this->routeConfig = $routeConfig;
    }


    public function process()
    {
        $this->setRequestURI();
        $this->setParamMap();
        $this->makeRegexRequest();

        $this->run();
    }

    public function setRequestURI(): void
    {
        if ($_SERVER['REQUEST_URI'] !== '/') {
            $this->requestURI = $this->clean($_SERVER['REQUEST_URI']);
            $this->routeConfig->route = $this->clean($this->routeConfig->route);
        }
    }

    private function clean(string $s): string
    {
        return preg_replace('/(^\/)|(\/$)/', '', $s);
    }

    public function setParamMap()
    {
        $routeArray = explode('/', $this->routeConfig->route);

        foreach ($routeArray as $key => $value) {
            if(preg_match('/{.*}/', $value)) {
                $this->paramMap[$key] = preg_replace('/(^{)|(}$)/', '', $value);
            }
        }
    }

    private function makeRegexRequest() {
        $requestURIArray = explode('/', $this->requestURI);

        foreach ($this->paramMap as $key=>$value) {
            if(!isset($requestURIArray[$key])) {
                return;
            }

            $this->paramRequestMap[$value] = $requestURIArray[$key];
            $requestURIArray[$key] = '{.*}';
        }

        $this->requestURI = implode('/', $requestURIArray);
        $this->prepareRegex();
    }

    private function prepareRegex() {
        $this->requestURI = str_replace('/', '\/', $this->requestURI);
    }

    private function run() {
        if(preg_match("/$this->requestURI/", $this->routeConfig->route)) {
            $this->render();
        }
    }

    public function render() {
        $class = $this->routeConfig->controller;
        $action = $this->routeConfig->action;
        (new $class)->$action(...$this->paramRequestMap);

        die();
    }
}