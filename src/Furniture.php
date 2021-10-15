<?php

class Furniture extends Product{
    private $Height;
    private $Width;
    private $Length;

    public function __construct($sku, $name, $price, $height, $width, $length){
        $this->Sku = $sku;
        $this->Name = $name;
        $this->Price = $price;
        $this->Type = "Furniture";
        $this->Height = $height;
        $this->Width = $width;
        $this->Length = $length;
    }

    public function save($connection): string
    {
        return "INSERT INTO Product (Sku, Name, Price, Type, Attribute) 
                    VALUES ('$this->Sku', '$this->Name', '$this->Price', '$this->Type', 
                                '$this->Height' + 'x' + '$this->Width' + 'x' + '$this->Length')";
    }
}