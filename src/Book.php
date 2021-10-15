<?php

class Book extends Product{
    private $Weight;

    public function __construct($sku, $name, $price, $weight){
        $this->Sku = $sku;
        $this->Name = $name;
        $this->Price = $price;
        $this->Type = "Book";
        $this->Weight = $weight;
    }

    public function save($connection): string
    {
        return "INSERT INTO Product (Sku, Name, Price, Type, Attribute) 
                    VALUES ('$this->Sku', '$this->Name', '$this->Price', '$this->Type', '$this->Weight')";
    }
}