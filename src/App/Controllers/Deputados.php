<?php

namespace Controllers;

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

    public function obter()
    {

        $count = $this->CRUD->count();
        if ($count == 77) { 
            return $this->CRUD->select();
        } else {
            $almg = new Almg();
            $response = $almg->request($this->URN);
            $this->CRUD->insertTodos($response);
            return $response;
        }

    }
 
}
