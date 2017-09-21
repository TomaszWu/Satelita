<?php

namespace src\Controller;

class Controller
{

    public function CreateView($viewName, $data = []){

        require_once (__DIR__ . '/../views/' . $viewName . '.php');
    }

}