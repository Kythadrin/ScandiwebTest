<?php
require_once './Model/Type.php';
require_once './Model/Database.php';

class TypeController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getTypes(): array
    {
        $typeArray = [];
        $result = mysqli_query($this->db->getConnection(), "SELECT * FROM product_type");

        while ($row = $result->fetch_assoc()) {
            $type = new Type();
            $type->setName($row['Name']);
            array_push($typeArray, $type);
        }

        return $typeArray;
    }

    public function displayTypes()
    {
        foreach ($this->getTypes() as $type) {
            echo '<option value='.$type->getName().' name='.$type->getName().'>'.$type->getName().'</option>';
        }
    }
}