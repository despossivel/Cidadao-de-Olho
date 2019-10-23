<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

use Controllers\Verbas;

return function (App $app) {
    $container = $app->getContainer();

    /**
     * @return Response
     *
     * @SWG\Get(
     *     path="/verba/deputado/{idDeputado}",
     *     description="Retorna todas as verbas indenizatórias do deputado informado ",
     *     produces={"application/json"},
     *     tags={"Todas as verbas indenizatórias do deputado"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK"
     *     ),
     * )
     */
    $app->get('/verba/deputado/{idDeputado}', 'Verbas:obter');

    /**
     * @return Response
     *
     * @SWG\Get(
     *     path="/verbas/todas",
     *     description="Retorna todas as verbas de todos os 77 deputados",
     *     produces={"application/json"},
     *     tags={"Todas as verbas indenizatórias de todos deputados"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK"
     *     ),
     * )
     */
    $app->get('/verbas/todas', 'Verbas:obterTodas');




    /**
     * @return Response
     *
     * @SWG\Get(
     *     path="/verbas/todas/ranking",
     *     description="Retorna retorna um ranking dos mais gastadores durante todos os periodos",
     *     produces={"application/json"},
     *     tags={"Todas as verbas indenizatórias de todos deputados"},
     *     @SWG\Response(
     *         response=200,
     *         description="OK"
     *     ),
     * )
     */
    $app->get('/verbas/todas/ranking', 'Verbas:rankingTodos');

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
    $app->get('/verbas/top5/{mes}', 'Verbas:top5');
};
