<?php


namespace Controllers;

class ErrorController
{
    public function e404()
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found', true, 404);
        echo "Сторінку не знайдено 404";
        exit();
    }
}