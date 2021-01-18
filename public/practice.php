<?php

class Animal {
    private $name;

    public function __construct($name)
    {
        return $this->name=$name;
        
    }
    public function sayName()
    {
        return "Hello, my name is $this->name";
    }

    public static function info()
    {
        return "Animal class";
    }
}


// $dog = new Animal;
// $dog->name = "Bobby";
// echo $dog->name;

// $dog->legs = 4;
// echo $dog->legs;

$dog = new Animal("Bobby");
echo $dog->sayName();
echo "<br>";
echo Animal::info();

echo "<br>";

class Dog extends Animal 
{
    //
}

$jack = new Dog("Jack");
echo $jack->sayName();

