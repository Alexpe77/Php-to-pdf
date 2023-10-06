<?php

use Bramus\Router\Router;

require_once './vendor/autoload.php';

$router = new Router();

require_once './config/routes.php';

require_once './config/load_env.php';
require_once './config/connect.php';

$router->run();
