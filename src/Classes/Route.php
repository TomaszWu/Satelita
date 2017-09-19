<?php
/**
 * Created by PhpStorm.
 * User: tomasz
 * Date: 14.09.17
 * Time: 21:16
 */

//namespace src\classes;


class Route
{

    public static $validRoutes = array();

    public static function set($route, $function){

        self::$validRoutes[] = $route;

//        print_r(self::$validRoutes);
        if($_GET['url'] == $route) {
            $function->__invoke();
        }
    }



}