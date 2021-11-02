<?php
require_once 'Product.php';
require_once 'DVD.php';
require_once 'Furniture.php';
require_once 'Book.php';
require_once 'Type.php';
require_once 'Controller/BookController.php';

class Database
{
    private $servername = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'scandiweb';
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->servername, $this->user, $this->password, $this->dbname);

        if ($this->connection->connect_errno) {
            echo "Failed to connect to database: " . $this->connection->connect_error;
            exit();
        }
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }
}