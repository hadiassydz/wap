<?php
class ConnectionDatabase {
    private $db_host = "localhost";
    private $db_username = "root";
    private $db_pass = "";
    private $db_name = "wap";
    public $connection;

    function __construct() {
        $this->connection = new mysqli(
            $this->db_host,
            $this->db_username,
            $this->db_pass,
            $this->db_name
        );

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    function __destruct() {
        $this->closeConnection();
    }
}
?>
