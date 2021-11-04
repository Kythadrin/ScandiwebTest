<?php

class Book extends Product
{
    private $weight;

    public function __construct()
    {
        $this->setType("Book");
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function setData($arr)
    {
        $this->setSku($arr['Sku']);
        $this->setName($arr['Name']);
        $this->setPrice($arr['Price']);

        if (array_key_exists('Attribute', $arr)) {
            $this->setWeight($arr['Attribute']);
        } elseif (array_key_exists('Weight', $arr)) {
            $this->setWeight($arr['Weight']);
        }
    }

    public function saveToDatabase($connection): bool
    {
        $result = mysqli_query($connection, "SELECT * FROM product WHERE Sku = '".$this->getSku()."'");

        if (!$result->fetch_assoc()) {
            mysqli_query($connection, "INSERT INTO product (Sku, Name, Price, Type, Attribute) 
                    VALUES ('".$this->getSku()."', '".$this->getName()."', '".$this->getPrice()."', 
                    '".$this->getType()."', '".$this->getWeight()."')");
            return true;
        } else {
            return false;
        }
    }
}