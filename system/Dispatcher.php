<?php

namespace System;



use Controllers\ErrorController;

class Dispatcher
{
    public function getPage(Track $track)
    {
        $fullName = "\\controllers\\$track->controller";

        $controller = new $fullName;
        $action = $track->action;

        if (method_exists($controller, $track->action)) {
            return $controller->$action();
        } else {
            return (new ErrorController)->e404();
        }
    }
}
