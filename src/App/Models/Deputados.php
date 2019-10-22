<?php

namespace Models;

use Models\Connect;


class Deputados  //extends Deputados
{
    
    private $CONNECT;

    function __construct()
    {   
        $connect = new Connect();
        $this->CONNECT = $connect->Mysqli();
    }


    // $mysqli->query("INSERT INTO registros_dominios (idRegistro, tipo, dominio, status, data_cadastro,
	// 											  usuario_cadastro, codigo) 
    //                                               VALUES ('" . $id . "', '" . $tipo . "', '" . $dados->dominio . "',1, '$data_atual', '$userAutorizacao', '$dados->codigo')");
                                                  

    public function select(){
        $this->CONNECT->query("SELECT * FROM deputados");
        
    }

    public function insert(){
            return $this->CONNECT;
    }


}
