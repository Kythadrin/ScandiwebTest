<?php

abstract class Product
{
    protected $Sku;
    protected $Name;
    protected $Price;
    protected $Type;

    public function __construct($sku, $name, $price, $type){
        $this->Sku = $sku;
        $this->Name = $name;
        $this->Price = $price;
        $this->Type = $type;
    }

    public function __get($name){
        if(property_exists($this, $name)){
            return $this->$name;
        }
    }

    public function __set($name, $value){
        if(property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    abstract public function save($connection) : string;
}