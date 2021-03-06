<?php

namespace Core;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function add($route, $params = [])
    {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z-]+)\}/', '(?P<\1>[a-z-]+)', $route);
        $route = preg_replace('/\{([a-z-]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $params;
    }

    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);
            if (strpos($parts[0], '='))
                $url = '';
            else
                $url = $parts[0];
        }
        return $url;
    }

    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key))
                        $params[$key] = $value;
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';
        if (array_key_exists('namespace', $this->params))
            $namespace .= $this->params['namespace'] . '\\';
        return $namespace;
    }

    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);
        $url == '' ?: array_shift($_GET);
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . $controller;
            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);
                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);
                if (is_callable([$controller_object, $action]))
                    $controller_object->$action();
                else
                    throw new \Exception("Method '$action' (in controller '$controller') not found");
            } else
                throw new \Exception("Controller class '$controller' not found");
        } else
            throw new \Exception("No route found for URL '$url'", 404);
    }
}
