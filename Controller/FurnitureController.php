<?php
require_once './Model/Furniture.php';
require_once './Model/Database.php';

class FurnitureController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getFurniture(): array
    {
        $furnitureArray = [];
        $result = mysqli_query($this->db->getConnection(), "SELECT * FROM product WHERE Type = 'Furniture'");

        while ($row = $result->fetch_assoc()) {
            $furniture = new Furniture();
            $furniture->setData($row);
            array_push($furnitureArray, $furniture);
        }

        return $furnitureArray;
    }
}