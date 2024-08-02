<?php

class Person 
{
    protected string $name;

    public function __construct($name) 
    {
        $this->name = $name;
    }

    public function getName() 
    {
        return $this->name;
    }
}

?>
