<?php

namespace src\Controller;

class Controller
{

    public static function CreateView($viewName, $data = []){

        require_once (__DIR__ . '/../View/' . $viewName . '.php');
    }

}