<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
 
return function (App $app) {
    $container = $app->getContainer(); 

  /**
   * Query database table
   *
   * @return Response
   *
   * @SWG\Get(
   *     path="/api/sample",
   *     description="Returns entries in table.",
   *     produces={"application/json"},
   *     tags={"Sample"},
   *     @SWG\Response(
   *         response=200,
   *         description="OK"
   *     ),
   *     @SWG\Response(
   *         response=401,
   *         description="Unauthorized action.",
   *     )
   * )
   */
 
  $app->get('/v2', function (Request $request, Response $response, array $args) {
      return $response->write('teste', 200);
  });


    $app->get('/v1/docs', function (Request $request, Response $response, array $args) {
        $dir = __DIR__ . '/'; // Scan Controller folder

        $swagger = \Swagger\scan([$dir]);
        
        $response->write($swagger);
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response;
    });
};
