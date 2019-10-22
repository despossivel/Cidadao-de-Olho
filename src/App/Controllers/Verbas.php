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
        $response = $almg->request("prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/{$idDeputado}/datas");
        return $response;
    }
}
