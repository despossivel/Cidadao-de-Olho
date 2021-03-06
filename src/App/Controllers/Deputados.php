<?php

namespace Controllers;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;


use Services\Almg;
use Models\Deputados as CRUD;

class Deputados
{

    private $URN;
    private $CRUD;

    function __construct()
    {
        $this->URN = 'deputados/em_exercicio';
        $this->CRUD = new CRUD();
    }

    public function todos(Request $request, Response $response, array $args)
    {
        $todos = $this->obter();
        return $response->withJson($todos, 200)->withHeader('Content-type', 'application/json');
    }

    public function obter()
    {

        $this->getDados();
        return $this->CRUD->select();
    }

    public function getDados()
    {
        $count = $this->CRUD->count();
        if ($count->num_rows == 77) {
            return true;
        } else {
            $almg = new Almg();
            $response = $almg->request($this->URN);
            $this->CRUD->insertTodos($response);
            return false;
        }
    }
}
