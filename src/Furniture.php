<?php

class Furniture extends Product
{
    private $Height;
    private $Width;
    private $Length;

    public function __construct()
    {
        $this->setType("Furniture");
    }

    public function getHeight()
    {
        return $this->Height;
    }

    public function setHeight($height)
    {
        $this->Height = $height;
    }

    public function getWidth()
    {
        return $this->Width;
    }

    public function setWidth($width)
    {
        $this->Width = $width;
    }

    public function getLength()
    {
        return $this->Length;
    }

    public function setLength($length)
    {
        $this->Length = $length;
    }

    public function setData($arr)
    {
        $this->setSku($arr['Sku']);
        $this->setName($arr['Name']);
        $this->setPrice($arr['Price']);
        if(array_key_exists('Attribute', $arr))
        {
            $attributes = explode("x", $arr['Attribute']);
            $this->setHeight($attributes[0]);
            $this->setWidth($attributes[1]);
            $this->setLength($attributes[2]);
        }
        if(array_key_exists('Height', $arr))
        {
            $this->setHeight($arr['Height']);
            $this->setWidth($arr['Width']);
            $this->setLength($arr['Length']);
        }
    }

    public function saveToDatabase($connection)
    {
        $result = mysqli_query($connection, "SELECT * FROM product WHERE Sku = '".$this->getSku()."'");

        if(!$result->fetch_assoc())
        {
            mysqli_query($connection, "INSERT INTO product (Sku, Name, Price, Type, Attribute) 
                    VALUES ('".$this->getSku()."', '".$this->getName()."', 
                    '".number_format($this->getPrice(), 2, '.', '')."', 
                    '".$this->getType()."','".$this->getHeight()."x".$this->getWidth()."x".$this->getLength()."')");
        }
        else
        {
            header("Location: index.php");
            exit();
        }
    }
}