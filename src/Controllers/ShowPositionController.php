<?php

require_once __DIR__.'/../Classes/ISSPosition.php';
require_once __DIR__.'/../Services/GetPosition.php';


class ShowPositionController extends Controller
{

    public static function showPosition(){

        $location = new ISSPosition();

        $location = $location->findCurrentLocation();

        $currentPosition = new GetPosition($location);

        $currentPosition = $currentPosition->prepareDraftPosition()->preparePositionToDisplay();

        self::CreateView('ShowPositionView', ['currentPosition' => $currentPosition[0]]);


    }


}