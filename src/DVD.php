<?php

class DVD extends Product{
    private $Size;

    public function __construct($sku, $name, $price, $size){
        $this->Sku = $sku;
        $this->Name = $name;
        $this->Price = $price;
        $this->Type = "DVD";
        $this->Size = $size;
    }

    public function save($connection): string
    {
        return "INSERT INTO Product (Sku, Name, Price, Type, Attribute) 
                    VALUES ('$this->Sku', '$this->Name', '$this->Price', '$this->Type', '$this->Size')";
    }
}