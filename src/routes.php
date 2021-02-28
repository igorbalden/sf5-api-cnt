<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {

    require __DIR__. '/routes/users.php';
    
    $app->get('/login', function (Request $request, Response $response, 
        array $args) {
        return $this->view->render($response, 'login.html', $args);
    })->setName('login');

    $app->get('/logout', function (Request $request, Response $response, 
        array $args) {
        return $this->view->render($response, 'login.html', $args);
    });

    $app->get('/register', function (Request $request, Response $response, 
        array $args) {
        return $this->view->render($response, 'register.html', $args);
    })->setName('register');
    
    $app->get('/', function (Request $request, Response $response, 
        array $args) {
        return $this->view->render($response, 'index.html', $args);
    })->setName('homepage');
};
