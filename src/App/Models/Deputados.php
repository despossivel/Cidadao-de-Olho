<?php

namespace Models;

use Services\Almg;
use Models\Connect;
use Models\Verbas as ModelVerbas;
use Controllers\Verbas as ControllersVerbas;

class Deputados  //extends Deputados
{

    private $CONNECT;

    function __construct()
    {
        $connect = new Connect();
        $this->CONNECT = $connect->Mysqli();
    }

    public function count()
    {
        return $this->CONNECT->query("SELECT idDeputados FROM deputados");
    }

    public function select()
    {
        $deputados = [];
        $select = $this->CONNECT->query("SELECT * FROM deputados");
        while ($deputado = $select->fetch_assoc()) {
            $deputados[] = $deputado;
        }

        return $deputados;
    }

    public function insertTodos($deputados)
    {
        $controllerVerbas = new ControllersVerbas();
        $modelVerbas = new ModelVerbas();

        for ($i = 0; $i < count($deputados); $i++) {

            $verbas = $controllerVerbas->obter($deputados[$i]["id"]);
            $modelVerbas->insert($verbas);

            $this->CONNECT->query("INSERT INTO deputados (idDeputados, nome, partido, tagLocalizacao) 
                                             VALUES ('{$deputados[$i]["id"]}','{$deputados[$i]["nome"]}','{$deputados[$i]["partido"]}','{$deputados[$i]["tagLocalizacao"]}')");

            if ($this->CONNECT->error) {
                echo "Error: " . $this->CONNECT->error;
                return false;
            }
            
        }

        return true;
    }
}
