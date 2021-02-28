<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/users', function (Request $request, Response $response, 
    array $args) {
    return $this->view->render($response, './users/users.html', $args);
});

$app->get('/users/{id}', function (Request $request, Response $response, 
    array $args) {
    return $this->view->render($response, './users/user.html', 
      ['args' => $args]
    );
});

