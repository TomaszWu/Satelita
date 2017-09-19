<?php


Route::set('index.php', function(){

    ShowPositionController::showPosition('ShowPositionView');
});



Route::set('test-us', function(){

    Test::CreateView('test');
});