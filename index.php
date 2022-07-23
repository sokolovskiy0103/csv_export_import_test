<?php

use System\Router;
use System\Dispatcher;

spl_autoload_register();

const DB_HOST = 'localhost';
const DB_NAME = 'test_task';
const DB_USER = 'root';
const DB_PASS = '';
const BASE_URL = '/';

//найпростіший пародійний роутер на регулярних виразах

$routes = require $_SERVER['DOCUMENT_ROOT'] . BASE_URL . '/config/routes.php';
$track = (new Router)->getTrack($routes, '/'. $_GET['customgetparams']);
$page = (new Dispatcher)->getPage($track);

echo $page;