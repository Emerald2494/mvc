<?php

class User {
    
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function saysHello()
    {
        return $this->name . ' says Hello';
    }

    public function saysAge()
    {
        return $this->name . ' is '. $this->age . ' years old. ';
    }

    public function __destruct()
    {
        echo "destructor run. ";
    }
}

$user1 = new User('Emerald', 24);
echo $user1->saysHello();
echo "<br>";
echo $user1->saysAge();

echo "<br>";

$user2 = new User('Kathy', 25);
echo $user2->saysHello();
echo "<br>";
echo $user2->saysAge();
echo "<br>";