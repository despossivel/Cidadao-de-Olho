<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

use Controllers\Deputados;

return function (App $app) {
    $container = $app->getContainer();
    $deputados = new Deputados();
    /*
   * @return Response
   *
   * @SWG\Get(
   *     path="/todos/deputados",
   *     description="Retorna todos os 77 deputados",
   *     produces={"application/json"},
   *     tags={"Deputados"},
   *     @SWG\Response(
   *         response=200,
   *         description="OK"
   *     ),
   * )
   */
    $app->get('/todos/deputados', 'Deputados:todos');

};
