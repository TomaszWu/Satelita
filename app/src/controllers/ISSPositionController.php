<?php

require_once __DIR__ . '/../model/ISSPositionModel.php';
require_once __DIR__ . '/../services/TranslatePosition.php';


class ISSPositionController extends Controller
{

    public static function showPosition(){

        $location = new ISSPositionModel();

        $location = $location->findCurrentLocation();

        $currentPosition = new TranslatePosition($location);

        $currentPosition = $currentPosition->prepareDraftPosition()->preparePositionToDisplay();


        self::CreateView('ISSPositionView', ['currentPosition' => $currentPosition[0]]);


    }


}