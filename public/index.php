<?php
if (PHP_SAPI == 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

$routesDeputados = require __DIR__ . '/../src/App/Routes/Deputados.php';
$routesDeputados($app);

$routesVerbas = require __DIR__ . '/../src/App/Routes/Verbas.php';
$routesVerbas($app);

$app->run();
