<?php

$router->get('/home', function() {
    include './views/home.html';
});

$router->get('/form', function() {
    include './views/form.php';
});

$router->get('/success', function() {
    include './views/success.php';
});