<?php

class User 
{
    private $name;
    private $age;

    public function __construct($name,$age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name=$name;
    }
}

$user = new User("Nu Nu",20);
echo $user->getName();

// class City 
// {
//     protected $city_name;

//     public function __construct($city_name)
//     {
//         return $this->city_name;
//     }

//     public function sayCity()
//     {
        
//     }
// }

// $add = new City('Yangon');
// echo $add->city_name;