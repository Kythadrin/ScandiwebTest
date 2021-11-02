<?php
require_once './Model/Book.php';
require_once './Model/Database.php';

class BookController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getBooks(): array
    {
        $booksArray = [];
        $result = mysqli_query($this->db->getConnection(), "SELECT * FROM product WHERE Type = 'Book'");

        while ($row = $result->fetch_assoc()) {
            $book = new Book();
            $book->setData($row);
            array_push($booksArray, $book);
        }

        return $booksArray;
    }
}