<?php

namespace Controllers;
//composer dumpautoload -o
use Services\Almg;
use Models\Verbas as CRUD;

class Verbas
{

    private $CRUD;

    function __construct()
    {
        $this->CRUD = new CRUD();
    }

    public function obter($idDeputado)
    {
        $almg = new Almg();
        return $almg->request("prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/{$idDeputado}/datas");
    }

    public function obterTodas()
    {
        return $this->CRUD->select();
    }

    public function rankingTodos()
    {
        return $this->CRUD->rankingTodos();
    }

    public function top5($mes)
    {
        return $this->CRUD->rankingTop($mes);
    }
}
