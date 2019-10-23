<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
 
/**
 * Class AbstractController
 *
 * @package App\Http\Controllers
 *
 * @SWG\Swagger(
 *     basePath="",
 *     host="localhost:8000",
 *     schemes={"http"},
 *     @SWG\Info(
 *         version="0.0.0.1",
 *         title="Cidadão de Olho",
 *         @SWG\Contact(name="Matheus H. Brito @despossivel", url="https://github.com/despossivel"),
 *     )
 * )
 */
return function (App $app) {
    $container = $app->getContainer(); 
    $app->get('/v1/docs', function (Request $request, Response $response, array $args) {
        $dir = __DIR__ . '/';
        $swagger = \Swagger\scan([$dir]);
        $response->write($swagger);
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response;
    });
};
