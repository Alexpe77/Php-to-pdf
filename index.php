<?php

use Bramus\Router\Router;

require_once './vendor/autoload.php';

$router = new Router();

require_once './config/routes.php';

$router->run();
