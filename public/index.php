<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Composer autoload

use App\Core\Router;

$router = new Router();
require_once __DIR__ . '/../app/routes.php';

$router->resolve();
