<?php

namespace Models;

use Models\Connect;
use Services\Almg;


class Verbas  //extends Deputados  //extends Deputados
{

    private $CONNECT;

    function __construct()
    {
        $connect = new Connect();
        $this->CONNECT = $connect->Mysqli();
    }

    public function insert($verba)
    {
        for ($i = 0; $i < count($verba); $i++) {
            $this->CONNECT->query("INSERT INTO verbas (idDeputado, dataReferencia) 
        VALUES ('{$verba[$i]["idDeputado"]}', '{$verba[$i]["dataReferencia"]["$"]}') ");

            if ($this->CONNECT->error) {
                echo "Error: " . $this->CONNECT->error;
                return false;
            }
        }
        return true;
    }


    public function rankingTodos()
    {
        $todos = [];
        $select = $this->CONNECT->query("SELECT count(verbas.idDeputado) as count, deputados.nome, deputados.partido FROM verbas 
        INNER JOIN deputados ON verbas.idDeputado=deputados.idDeputados
       group by idDeputado order by count desc");

        while ($deputado = $select->fetch_assoc()) {
            $todos[] = $deputado;
        }
        return $todos;
    }



    public function rankingTop($mes)
    {
        $top = [];
        $select = $this->CONNECT->query("SELECT count(verbas.idDeputado) as verbasIdenizatiorias, deputados.nome, deputados.partido, verbas.dataReferencia 
        FROM verbas 
        INNER JOIN deputados ON verbas.idDeputado=deputados.idDeputados
        WHERE  MONTH(dataReferencia) = '{$mes}' AND YEAR(dataReferencia) = '2019'
        group by verbas.idDeputado
        ORDER BY verbasIdenizatiorias DESC
        LIMIT 5");

        while ($deputado = $select->fetch_assoc()) {
            $top[] = $deputado;
        }

        return $top;
    }


    public function select($idDeputado)
    {
        $verbas = [];
        $select = $this->CONNECT->query("SELECT * FROM deputados");
        while ($verba = $select->fetch_assoc()) {
            $verbas[] = $verba;
        }

        return $verbas;
    }
}
