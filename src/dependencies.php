<?php

use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // Register Twig View helper
    $container['view'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        $view = new \Slim\Views\Twig($settings['template_path'],
            ['cache' => false]
        );
        $router = $c->get('router');
        $uri = \Slim\Http\Uri::createFromEnvironment(
            new \Slim\Http\Environment($_SERVER));
        $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
        return $view;
    };
    $container['view']['APP_SERVER_URL'] = $_SERVER['APP_SERVER_URL'];

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $streamHandler = new \Monolog\Handler\StreamHandler(
            $settings['path'], $settings['level']);
        $streamHandler->setFormatter(new \Monolog\Formatter\LineFormatter(
            "%datetime% > %level_name% > %message%\n", "Y-m-d H:i:s", TRUE));
        $logger->pushHandler($streamHandler);
        return $logger;
    };
};
