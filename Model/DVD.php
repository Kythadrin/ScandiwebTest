<?php

class DVD extends Product
{
    private $size;

    public function __construct()
    {
        $this->setType("DVD");
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function setData($arr)
    {
        $this->setSku($arr['Sku']);
        $this->setName($arr['Name']);
        $this->setPrice($arr['Price']);

        if (array_key_exists('Attribute', $arr)) {
            $this->setSize($arr['Attribute']);
        } elseif (array_key_exists('Size', $arr)) {
            $this->setSize($arr['Size']);
        }
    }

    public function saveToDatabase($connection): bool
    {
        $result = mysqli_query($connection, "SELECT * FROM product WHERE Sku = '".$this->getSku()."'");

        if (!$result->fetch_assoc()) {
            mysqli_query($connection, "INSERT INTO product (Sku, Name, Price, Type, Attribute) 
                    VALUES ('".$this->getSku()."', '".$this->getName()."', '".$this->getPrice()."', 
                    '".$this->getType()."', '".$this->getSize()."')");
            return true;
        } else {
            return false;
        }
    }
}