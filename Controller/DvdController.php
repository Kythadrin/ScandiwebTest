<?php
require_once './Model/DVD.php';
require_once './Model/Database.php';

class DvdController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDvds(): array
    {
        $dvdArray = [];
        $result = mysqli_query($this->db->getConnection(), "SELECT * FROM product WHERE Type = 'DVD'");

        while ($row = $result->fetch_assoc()) {
            $dvd = new DVD();
            $dvd->setData($row);
            array_push($dvdArray, $dvd);
        }

        return $dvdArray;
    }
}