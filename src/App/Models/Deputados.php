<?php

namespace Models;

use Models\Connect;


class Deputados  //extends Deputados
{
    
    private $CONNECT;

    function __construct()
    {   
        $this->CONNECT = new Connect();
    }

    public function insert(){
            return $this->CONNECT;
    }




}
