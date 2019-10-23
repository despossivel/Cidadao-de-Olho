<?php

namespace Controllers;
//composer dumpautoload -o
use Services\Almg;
use Models\Verbas as CRUD;

class Verbas
{
    public function obter($idDeputado)
    {
        $almg = new Almg();
        return $almg->request("prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/{$idDeputado}/datas");
    }

    public function obterTodas()
    {
        $verbas = new CRUD();
        return $verbas->select();
    }

    public function rankingTodos()
    {
        $verbas = new CRUD();
        return $verbas->rankingTodos();
    }
}
