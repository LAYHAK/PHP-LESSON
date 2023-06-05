<?php 
    Class Person{
        public $name;
        public $age;
        public $gender;
        function __construct($name,$age,$gender){
            $this->name=$name;
            $this->age=$age;
            $this->gender=$gender;
        }
        function getName(){
            echo $this->name;
        }
        function getAge(){
            return $this->age;
        }
        function getGender(){
            return $this->gender;
        }
    }
    class Teacher extends Person{
        protected $salary;
        protected $subject;
        function __construct($name,$age,$gender,$salary,$subject){
            parent::__construct($name,$age,$gender);
            $this->salary =$salary;
            $this->subject=$subject;
        }
        function getSalary($salary){
            return $this->$salary;
        }
        function getSubject($subject){
            return $this->$subject;
        }
    }
    $person = new Person("Hello",18,'M');
    // $teacher = new Teacher("Hello",18,'M',1000,"Math");
?>