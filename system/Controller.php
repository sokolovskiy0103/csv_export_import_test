<?php


namespace System;

class Controller
{
    public function render($view, $data = [], $layout = 'layout'): bool|string
    {
        $layoutPath = $_SERVER['DOCUMENT_ROOT'] . BASE_URL ."/views/layouts/$layout.php";
        ob_start();
        extract($data);
        $content = $this->renderView($view, $data);
        include $layoutPath;
        return ob_get_clean();
    }

    public function renderView($view, $data): bool|string
    {
        $viewPath = $_SERVER['DOCUMENT_ROOT'] . BASE_URL . "/views/$view.php";
        ob_start();
        extract($data);
        include $viewPath;
        return ob_get_clean();
    }
}
