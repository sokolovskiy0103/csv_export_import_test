<?php

namespace System;

class Router
{
    public function getTrack($routes, $uri): Track
    {
        foreach ($routes as $route) {
            if (preg_match($route->path, $uri)) {
                return new Track($route->controller, $route->action);
            }
        }
        return new Track('ErrorController', 'e404');
    }
}
