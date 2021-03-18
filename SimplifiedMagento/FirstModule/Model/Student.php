<?php
namespace SimplifiedMagento\FirstModule\Model;

class Student 
{

	private $name;
	private $age;
	private $scores;

	public function __construct($name = 'Aayushi', $age = 24, $scores = array('maths' => 92, 'programming' => 90))
	{
		$this->name = $name;
		$this->age = $age;
		$this->scores = $scores;
	}

}