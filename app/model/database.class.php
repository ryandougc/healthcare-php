<?php

class Database {
    private $host = "localhost";
    private $user = "dev";
    private $pwd = "healthcare";
    private $dbName = "healthcare_system";

    protected function connect() {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
    }
}