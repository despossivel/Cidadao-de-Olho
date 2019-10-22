<?php

namespace Controllers;

use Services\Almg;
use Models\Deputados as CRUD;

class Deputados
{

    public function obterTodos()
    {
        $almg = new Almg();
        $response = $almg->request('deputados/em_exercicio');
        return $response;
    }

    public function obterVerbas($idDeputado)
    {
        $almg = new Almg();
        $response = $almg->request("prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/{$idDeputado}/datas");
        return $response;
    }
}
