<?php
/**
 * Created by PhpStorm.
 * User: tomasz
 * Date: 14.09.17
 * Time: 21:36
 */

class Controller
{

    public static function CreateView($viewName, $data = []){

        require_once (__DIR__.'/../Views/' . $viewName . '.php');
    }

}