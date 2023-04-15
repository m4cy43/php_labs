<?php
class dbConnect
{
    public readonly mysqli $connection;

    public function __construct(
        private $host = 'localhost',
        private $username = 'root',
        private $password = 'malvina',
        private $database = 'users',
    ) {
        if (!isset($this->connection)) {
            $this->connection = new mysqli(
                $this->host,
                $this->username,
                $this->password,
                $this->database
            );
            if (!$this->connection) {
                echo 'DB connection error';
                exit;
            }
        }
    }
}