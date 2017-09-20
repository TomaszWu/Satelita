<?php


class Route
{

    public static $validRoutes = array();

    /**
     * Create a cart for the client
     *
     * @return bool
     */
    public static function set($route, $function){

        self::$validRoutes[] = $route;

        if($_GET['url'] == $route) {

            $function->__invoke();

            return true;
        }

        require_once (__DIR__ . '/../views/pageNotFound.php');

    }

}