<?php
// tutorial on how to use namespaces, interfaces and traits in PHP

namespace Config;
require "../vendor/autoload.php";

use Interfaces\Hello;
use Lib;
use Traits\hi;

// connection string using OOP

class test implements Hello {
    use hi;

    public function lol(){
       echo "hi, you have successfully autoloaded from config class!!!";
    }
    public function sayHi(){
        return "Hi, I am the interface class!!";
    }
}

$lib = new Lib\test();
$libr = new test();
$libr->lol();
echo $libr->sayHi();
$libr->sayHello();