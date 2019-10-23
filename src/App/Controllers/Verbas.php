<?php

namespace Controllers;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

use Services\Almg;
use Models\Verbas as CRUD;

class Verbas
{

    private $CRUD;

    function __construct()
    {
        $this->CRUD = new CRUD();
    }

    public function todas(Request $request, Response $response, array $args)
    {
        $todas = $this->obter($args['idDeputado']);
        return $response->withJson($todas, 200)->withHeader('Content-type', 'application/json');
    }

    public function obter($idDeputado)
    {
        $almg = new Almg();
        return $almg->request("prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/{$idDeputado}/datas");
    }

    public function obterTodas(Request $request, Response $response, array $args)
    {
        return $response->withJson($this->CRUD->select(), 200)->withHeader('Content-type', 'application/json');
    }

    public function rankingTodos(Request $request, Response $response, array $args)
    {
        return $response->withJson($this->CRUD->rankingTodos(), 200)->withHeader('Content-type', 'application/json');
    }

    public function top5(Request $request, Response $response, array $args)
    {
        return $response->withJson($this->CRUD->rankingTop($args['mes']), 200)->withHeader('Content-type', 'application/json');
    }
}
