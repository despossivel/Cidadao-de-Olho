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
        $count = $crud->count();
        
        if ($count == 77) { 
            return $crud->select();
        } else {
            $almg = new Almg();
            $response = $almg->request($this->URN);
            $insertTodos = $crud->insertTodos($response);
            return $response;
        }

    }
 
}
