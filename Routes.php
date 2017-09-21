<?php

namespace Routes;

use src\Core\Route;
use src\Controller\ISSPositionController;
use src\Model\ISSPositionModel;

$route = $_GET['url'];

switch($route):
    case('index.php'):

        $route = new Route();

        $route->set('index.php', function(){

            $ISSPositionController = new ISSPositionController();

            $ISSPositionController->showPosition();

        });

        break;
    default:
        require_once(__DIR__ . '/src/app/views/pageNotFound.php');
endswitch;
