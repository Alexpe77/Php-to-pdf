<?php

$router->get('/home', function() {
    include './view/home.html';
});

$router->get('/form', function() {
    include './view/form.php';
});

$router->get('/success', function() {
    include './view/success.php';
});