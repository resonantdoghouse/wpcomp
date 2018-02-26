<?php

/**
 * Template Name: OOP
 */

class Dog {
	public $name;
	public $breed;
    public $colour;
    
	public function bark() {
		return 'Woof!';
	}

	public function walk() {
		return 'Happy dog :)';
	}
}


/**
 * slide 7
 */
// dog_1
$dog_1 = new Dog();
$dog_1->name = 'Rex';
$dog_1->breed = 'Poodle';
$dog_1->colour = 'white';

echo $dog_1->bark();

d($dog_1);

//d($dog_1->bark());

// dog_2
$dog_2 = new Dog();
$dog_2->name = 'Buster';
$dog_2->breed = 'Great Dane';
$dog_2->colour = 'grey';
echo $dog_2->walk();

d($dog_2);



class Warrior {
	public $name;

	private $secret = 'Scared of mice';

	public function __construct($warrior_name) {
		$this->name = $warrior_name;
	}

	public function melee() {
		return 'Smash, smash, smash';
	}

	public function show_secret(){
		return $this->secret;
	}

}
//
$hammaurai = new Warrior('hammaurai');



echo $hammaurai->name;
echo $hammaurai->show_secret();

$hammaurai->name = 'bob';
echo $hammaurai->name;


die($hammaurai->name);