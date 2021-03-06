<?php

class person
{
    public $name;
    public $gender;

    public function say()
    {
        echo $this->name, "\tis ", $this->gender, "\r\n";
    }
}

class family
{
    public $people;
    public $location;

    public function __construct($p, $loc)
    {
        $this->people = $p;
        $this->location = $loc;
    }
}

$student = new person();
$student->name = 'Tom';
$student->gender = 'male';
$student->say();

$tom = new family($student, 'peking');
echo serialize($student);
$student_arr = ['name' => 'Tom', 'gender' => 'male'];
echo "\n";
echo serialize($student_arr);
print_r($tom);
echo "\n";
echo serialize($tom);