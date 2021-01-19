<?php
//namespace Config;
//require "vendor/autoload.php";



class test {
    private $name = " Aduramimo";
    private $age = 35;
    private  $married = FALSE;

   /** public function __construct(){
       echo "hi";
    }**/

public function getName(){
    return $this->name;
}

public function setName($name){
    $this->name = $name;
}

}

$test = new test();

$test->setName("Jamie Vardy");
echo $test->getName();
//$tester = new \Config\test();
