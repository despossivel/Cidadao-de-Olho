<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

use Controllers\Deputados;

return function (App $app) {
    $container = $app->getContainer();
    
    $app->get('/todos/deputados', function (Request $request, Response $response, array $args) use ($container) {
        $deputados = new Deputados();
        return $response->withJson($deputados->obter(), 200)
            ->withHeader('Content-type', 'application/json');
    });

    $app->get('/top/5/deputados', function (Request $request, Response $response, array $args) use ($container) {
        $deputados = new Deputados();
        
        return $response->withJson($deputados->top(), 200)
            ->withHeader('Content-type', 'application/json');
    });

};
