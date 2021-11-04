<?php

class Furniture extends Product
{
    private $height;
    private $width;
    private $length;

    public function __construct()
    {
        $this->setType("Furniture");
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function setData($arr)
    {
        $this->setSku($arr['Sku']);
        $this->setName($arr['Name']);
        $this->setPrice($arr['Price']);

        if (array_key_exists('Attribute', $arr)) {
            $attributes = explode("x", $arr['Attribute']);
            $this->setHeight($attributes[0]);
            $this->setWidth($attributes[1]);
            $this->setLength($attributes[2]);
        } elseif (array_key_exists('Height', $arr)) {
            $this->setHeight($arr['Height']);
            $this->setWidth($arr['Width']);
            $this->setLength($arr['Length']);
        }
    }

    public function saveToDatabase($connection): bool
    {
        $result = mysqli_query($connection, "SELECT * FROM product WHERE Sku = '".$this->getSku()."'");

        if (!$result->fetch_assoc()) {
            mysqli_query($connection, "INSERT INTO product (Sku, Name, Price, Type, Attribute) 
                    VALUES ('".$this->getSku()."', '".$this->getName()."', 
                    '".number_format($this->getPrice(), 2, '.', '')."', 
                    '".$this->getType()."','".$this->getHeight()."x".$this->getWidth()."x".$this->getLength()."')");
            return true;
        } else {
            return false;
        }
    }
}