<?php

namespace Routes;

use src\Core\Route;
use src\Controller\ISSPositionController;


Route::set('index.php', function(){

    ISSPositionController::showPosition();
});

