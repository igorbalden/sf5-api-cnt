<?php 

require __DIR__ . '/../vendor/autoload.php';
$baseDir = __DIR__ . '/../';
$dotenv = Dotenv\Dotenv::createImmutable($baseDir);
$envFile = $baseDir . '.env';
if (file_exists($envFile)) {
    $dotenv->load();
}
$dotenv->required(['APP_SERVER_URL']);

$settings = require __DIR__ . '/settings.php';
$app = new \Slim\App($settings);
$dependencies = require __DIR__ . '/dependencies.php';
$dependencies($app);
$middleware = require __DIR__ . '/middleware.php';
$middleware($app);
$routes = require __DIR__ . '/routes.php';
$routes($app);
