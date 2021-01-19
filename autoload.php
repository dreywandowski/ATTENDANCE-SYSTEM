<?php

spl_autoload_register(function($classname){
    if (file_exists('config/'.$classname.'.php')){
        include_once 'config/'.$classname.'.php';
    }
    else if (file_exists('lib/PHPMailer/src/'.$classname.'.php')){
        include_once 'lib/PHPMailer/src/'.$classname.'.php';
    }
    else if (file_exists('app/dashboard/lib/fpdf/'.$classname.'php')){
        include_once 'app/dashboard/lib/fpdf/'.$classname.'.php';
    }
    else {
        include_once $classname.'.php';
    }
});


