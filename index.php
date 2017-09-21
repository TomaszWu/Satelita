<?php
require __DIR__ . '/vendor/autoload.php';

use src\Core\Route;
require_once ('Routes.php');

function __autoload($class_name)
{
    if (file_exists('src/app/classes/' . $class_name . '.php')){
        require_once 'src/app/classes/' . $class_name . '.php';
    }
    elseif (file_exists('src/app/controllers/' . $class_name . '.php')){
        require_once 'src/app/controllers/' . $class_name . '.php';
    }
}