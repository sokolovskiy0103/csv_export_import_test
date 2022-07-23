<?php

use System\Route;

return [
    new Route('#^/import$#', 'UserController', 'import'),
    new Route('#^/$#', 'UserController', 'import'),
    new Route('#^/result$#', 'UserController', 'result'),
    new Route('#^/result\?#', 'UserController', 'result'),
    new Route('#^/clear$#', 'UserController', 'clear'),
];
