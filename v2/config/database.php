<?php

class Database
{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "ict_ims_db";

    public $conn;

    public function connect()
    {

        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if ($this->conn->connect_error) {
            die("Database Connection Failed");
        }

        return $this->conn;
    }
}
