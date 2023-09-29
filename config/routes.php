<?php

use Bramus\Router\Router;

require_once './vendor/autoload.php';

$router = new Router();

$router->get('/home', function() {
    include 'index.html';
});

$router->get('/form', function() {
    include 'form.php';
});

$router->run();