<?php

namespace Models;

class Connect
{
    private $connection;
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function __construct()
    {

        $conn = array(
            "host" => "192.168.3.19",
            "username" => "root",
            "password" => "root",
            "database" => "laravel",
        );

        $this->connection = new mysqli($conn["host"], $conn["username"], $conn["password"], $conn["database"]);

        if ($this->connection->error) {
            trigger_error("Failed to connect to MYSQL" . $this->connection->error, E_USER_ERROR);
        }
    }

    private function __clone()
    { }

    public function getConnection()
    {
        return $this->connection;
    }
}
