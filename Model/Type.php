<?php

class Type
{
    private $Name;

    public function setName($name)
    {
        $this->Name = $name;
    }

    public function getName()
    {
        return $this->Name;
    }
}