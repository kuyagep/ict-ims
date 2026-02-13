<?php

require_once __DIR__ . '/../../config/database.php';

class Asset
{

    private $conn;
    private $table = "assets";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAll()
    {

        $query = "SELECT * FROM {$this->table}";
        $result = $this->conn->query($query);

        return $result;
    }
}
