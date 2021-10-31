<?php

class DVD extends Product
{
    private $Size;

    public function __construct()
    {
        $this->setType("DVD");
    }

    public function getSize()
    {
        return $this->Size;
    }

    public function setSize($size)
    {
        $this->Size = $size;
    }

    public function setData($arr)
    {
        $this->setSku($arr['Sku']);
        $this->setName($arr['Name']);
        $this->setPrice($arr['Price']);
        if(array_key_exists('Attribute', $arr))
        {
            $this->setSize($arr['Attribute']);
        }
        if(array_key_exists('Size', $arr))
        {
            $this->setSize($arr['Size']);
        }
    }

    public function saveToDatabase($connection)
    {
        $result = mysqli_query($connection, "SELECT * FROM scandiweb.product WHERE Sku = '".$this->getSku()."'");

        if(!$result->fetch_assoc())
        {
            mysqli_query($connection, "INSERT INTO scandiweb.product (Sku, Name, Price, Type, Attribute) 
                    VALUES ('".$this->getSku()."', '".$this->getName()."', '".$this->getPrice()."', 
                    '".$this->getType()."', '".$this->getSize()."')");
        }
        else
        {
            echo 'Product is already exist';
            exit();
        }
    }
}