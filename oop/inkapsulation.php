<?php

/**
 * Написать класс “Человек” с публичным методом “Сказать” и скрытым методом “Подумать”,
 * а также со свойствами: публичными - рост, вес, возраст, и приватными - темперамент и способности
 */

class Human {

    private $temperament, $ability;

    public $height, $weight, $age;

    function __construct($height, $weight, $age)
    {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }

    public function say() {
        echo 'говорю' . '<br>';
    }

    public function think() {
        echo 'Я сначала думаю' . '<br>';
    }
}

class IntelligentHuman extends Human {
    public function say() {
        $this->think();
        parent::say();
    }
}

class StupidHuman extends Human {
    public function say() {
        echo 'Я ничего не думаю и ';
        parent::say();
    }
}

$human1 = new IntelligentHuman(170,70,30);
$human2 = new StupidHuman(180,80,20);
$human1->say();
$human2->say();
