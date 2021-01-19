<?php
namespace Lib;
require "../vendor/autoload.php";

use Config;

// connection string using OOP

class test {
    public function __construct(){
       echo "hi, you have successfully autoloaded from the lib class!!!";
    }
}

$config = new Config\test();

