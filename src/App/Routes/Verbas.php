<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

use Controllers\Verbas;

return function (App $app) {
    $container = $app->getContainer();
    $verbas = new Verbas();


    /**
     * @return Response
     *
     * @SWG\Get(
     *     path="/verba/deputado/{idDeputado}",
     *     description="Retorna todas as verbas indenizatórias do deputado informado ",
     *     produces={"application/json"},
     *     tags={"Todas as verdas indenizatórias do deputado"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK"
     *     ),
     * )
     */
    $app->get('/verba/deputado/{idDeputado}', function (Request $request, Response $response, array $args) use ($verbas) {
        return $response->withJson($verbas->obter($args['idDeputado']), 200)->withHeader('Content-type', 'application/json');
    });


    /**
     * @return Response
     *
     * @SWG\Get(
     *     path="/verbas/todas",
     *     description="Retorna todas as verbas de todos os 77 deputados",
     *     produces={"application/json"},
     *     tags={"Todas as verdas indenizatórias de todos deputados"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK"
     *     ),
     * )
     */
    $app->get('/verbas/todas', function (Request $request, Response $response, array $args) use ($verbas) {
        return $response->withJson($verbas->obterTodas(), 200)->withHeader('Content-type', 'application/json');
    });

    /**
     * @return Response
     *
     * @SWG\Get(
     *     path="/verbas/todas/ranking",
     *     description="Retorna retorna um ranking dos mais gastadores durante todos os periodos",
     *     produces={"application/json"},
     *     tags={"Todas as verdas indenizatórias de todos deputados"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK"
     *     ),
     * )
     */
    $app->get('/verbas/todas/ranking', function (Request $request, Response $response, array $args) use ($verbas) {
        return $response->withJson($verbas->rankingTodos(), 200)->withHeader('Content-type', 'application/json');
    });


    /**
     * @return Response
     *
     * @SWG\Get(
     *     path="/verbas/top5/{mes}",
     *     description="Retorna um ranking TOP 5 dos deputados que mais gastaram por mês",
     *     produces={"application/json"},
     *     tags={"Informe o mês para ver o TOP 5, podendo ser ex: 2 ou 02 para fevereiro"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK"
     *     ),
     * )
     */
    $app->get('/verbas/top5/{mes}', function (Request $request, Response $response, array $args) use ($verbas) {
        return $response->withJson($verbas->top5($args['mes']), 200)->withHeader('Content-type', 'application/json');
    });
};
