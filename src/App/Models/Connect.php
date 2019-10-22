<?php

namespace Models;

// use Exception;

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
        
        $conn = array(
            "host" => "192.168.3.19",
            "username" => "root",
            "password" => "root",
            "database" => "laravel"
        );

        $this->mysqli = new \mysqli(
            $conn["DB_HOST"],
            $conn["DB_USERNAME"],
            $conn["DB_PASSWORD"],
            $conn["DB_DATABASE"],
            $conn["DB_PORT"]
        );

        try {
            $this->mysqli->set_charset("utf8");
            return $this->mysqli;
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }


    // private $connection;
    // private static $instance;

    // public static function getInstance()
    // {
    //     if (!self::$instance) {
    //         self::$instance = new self();
    //     }
    //     return self::$instance;
    // }
 

    // function __construct()
    // {

    //     $conn = array(
    //         "host" => "192.168.3.19",
    //         "username" => "root",
    //         "password" => "root",
    //         "database" => "laravel"
    //     );

    //     $this->connection = new \mysqli($conn["host"], $conn["username"], $conn["password"], $conn["database"]);

    //     if ($this->connection->error) {
    //         trigger_error("Failed to connect to MYSQL" . $this->connection->error, E_USER_ERROR);
    //     }
    // }

    // private function __clone()
    // { }

    // public function getConnection()
    // {
    //     return $this->connection;
    // }




}
