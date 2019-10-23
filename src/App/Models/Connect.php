<?php

namespace Models;
use Exception;

class Connect
{

    private $env;
    private $fp;
    public $mysqli;

    function __construct()
    {
        $this->env = array();
        $this->fp = fopen(__DIR__ . "/../../.env", "r");
        $this->open();
    }

    private function open()
    {
        while (!feof($this->fp)) {
            $linha = fgets($this->fp, 4096);
            if ($linha != "") {
                $ex = explode("=", $linha);
                $this->env[$ex["0"]] = trim($ex["1"]);
            }
        }

        fclose($this->fp);
    }


    public function Mysqli()
    {

        $this->mysqli = new \mysqli(
            $this->env["DB_HOST"],
            $this->env["DB_USERNAME"],
            $this->env["DB_PASSWORD"],
            $this->env["DB_DATABASE"],
            $this->env["DB_PORT"]
        );

        try {
            $this->mysqli->set_charset("utf8");
            return $this->mysqli;
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }
}
