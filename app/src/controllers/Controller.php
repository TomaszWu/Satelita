<?php

class Controller
{

    public static function CreateView($viewName, $data = []){

        require_once (__DIR__ . '/../views/' . $viewName . '.php');
    }

}