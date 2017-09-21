<?php

namespace src\Core;

class Route
{

    public static $validRoutes = array();

    /**
     * Create a routing
     */
    public function set($route, $function){

        self::$validRoutes[] = $route;

        if($_GET['url'] == $route) {

            $function->__invoke();

        }
    }
}