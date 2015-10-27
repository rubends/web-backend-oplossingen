<?php
    class Animal
    {
        public $name;
        public $gender;
        public $health;
        
        public function __construct($name, $gender, $health)
        {
            $this->name	= $name;
			$this->gender = $gender;
			$this->health =	$health;
            
        }
        public function getName()
        { return $this->name; }
        public function getGender()
        { return $this->gender; }
        public function getHealth()
        { return $this->health; }
        
        public function changeHealth($healthChange)
        {
            $this->health = ($this->health + $healthChange);
            return $this->health;
        }
        
        public function doSpecialMove()
        {
            return "walk";
        }
        
        
        
    }
    
?>