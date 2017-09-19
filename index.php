<?php

require_once('app/src/core/Route.php');
require_once ('Routes.php');

function __autoload($class_name)
{
    if (file_exists('app/src/classes/' . $class_name . '.php')){
        require_once 'app/src/classes/' . $class_name . '.php';
    }
    elseif (file_exists('app/src/controllers/' . $class_name . '.php')){
        require_once 'app/src/controllers/' . $class_name . '.php';
    }
}