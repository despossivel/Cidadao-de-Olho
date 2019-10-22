<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

use Controllers\Verbas;

return function (App $app) {
    $container = $app->getContainer();
     
    $app->get('/verba/deputado/{idDeputado}',function (Request $request, Response $response, array $args) use ($container) {
        $deputados = new Verbas();
        return $response->withJson($deputados->obter($args['idDeputado']), 200)
        ->withHeader('Content-type', 'application/json');
    });

};
