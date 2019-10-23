<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

use Controllers\Deputados;

return function (App $app) {
    $container = $app->getContainer();
    $deputados = new Deputados();

    $app->get('/todos/deputados', function (Request $request, Response $response, array $args) use ($deputados) {
        return $response->withJson($deputados->obter(), 200)->withHeader('Content-type', 'application/json');
    });
};
