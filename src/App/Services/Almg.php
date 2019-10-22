<?php

namespace Services;

// namespace App;
//http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/26153/datas?formato=json
//http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio
class Almg
{

    private $URL = 'http://dadosabertos.almg.gov.br/ws/';
    private $FORMATO = '?formato=json';
    private $METHOD = 'GET';
    private $URN;

    private function setURN($parametro)
    {
        $this->URN = $parametro;
    }

    private function setMETHOD($method)
    {
        $this->METHOD = $method;
    }

    public function request($URN)
    {
        $this->setURN($URN);
        $ch = curl_init("{$this->URL}{$this->URN}{$this->FORMATO}");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($ch), true);
        return $response;
    }
}
