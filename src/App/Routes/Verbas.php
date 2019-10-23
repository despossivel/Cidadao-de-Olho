<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

use Controllers\Verbas;

return function (App $app) {
    $container = $app->getContainer();
    $verbas = new Verbas();

    $app->get('/verba/deputado/{idDeputado}', function (Request $request, Response $response, array $args) use ($container, $verbas) {
        return $response->withJson($verbas->obter($args['idDeputado']), 200)
            ->withHeader('Content-type', 'application/json');
    });

    $app->get('/verbas/todas', function (Request $request, Response $response, array $args) use ($container, $verbas) {
        return $response->withJson($verbas->obterTodas(), 200)
            ->withHeader('Content-type', 'application/json');
    });

    $app->get('/verbas/todas/ranking', function (Request $request, Response $response, array $args) use ($container, $verbas) {
        return $response->withJson($verbas->rankingTodos(), 200)
            ->withHeader('Content-type', 'application/json');
    });

    $app->get('/verbas/top5/{mes}', function (Request $request, Response $response, array $args) use ($container, $verbas) {
        return $response->withJson($verbas->top5($args['mes']), 200)
            ->withHeader('Content-type', 'application/json');
    });
};
