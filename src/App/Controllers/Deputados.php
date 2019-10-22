<?php

namespace Controllers;

use Services\Almg;
use Models\Deputados as CRUD;

class Deputados
{

    private $URN = 'deputados/em_exercicio';

    public function obter()
    {


        $crud = new CRUD();
        print_r($crud->insert());





        $almg = new Almg();
        $response = $almg->request($this->URN);
        
        return $response;
    }

    public function top($idDeputado)
    {
        return $idDeputado;
        // $almg = new Almg();
        // $response = $almg->request("prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/{$idDeputado}/datas");
        // return $response;
    }
}
