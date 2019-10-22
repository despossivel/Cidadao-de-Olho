<?php

namespace Controllers;

use Services\Almg;
use Models\Deputados as CRUD;

class Deputados
{

    private $URN;

    function __constructor()
    {
        $this->URN = 'deputados/em_exercicio';
    }

    public function obter()
    {
        $almg = new Almg();
        $response = $almg->request('deputados/em_exercicio');
        return $response;
    }

    public function top($idDeputado)
    {
        return "[{'top':5}]";
        // $almg = new Almg();
        // $response = $almg->request("prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/{$idDeputado}/datas");
        // return $response;
    }
}
