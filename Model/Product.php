<?php

abstract class Product
{
    public $Sku;
    public $Name;
    public $Price;
    public $Type;

    public function getSku()
    {
        return $this->Sku;
    }

    public function setSku($sku)
    {
        $this->Sku = $sku;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($name)
    {
        $this->Name = $name;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function setPrice($price)
    {
        $this->Price = $price;
    }

    public function getType()
    {
        return $this->Type;
    }

    public function setType($type)
    {
        $this->Type = $type;
    }

    abstract protected function setData($arr);
    abstract protected function saveToDatabase($connection);
}