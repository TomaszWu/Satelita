<?php

namespace src\Controller;

use src\Model\ISSPositionModel;
use src\Service\TranslatePosition;
use src\Controller\Controller;

/**
 * Class ISSPositionController
 */
class ISSPositionController extends Controller
{

    /**
     * Prepare information about current ISS' position
     */
    public static function showPosition(){

        $location = new ISSPositionModel();

//        var_dump($location);
//        exit;

        $location = $location->findCurrentLocation();

        $currentPosition = new TranslatePosition($location);

        $currentPosition = $currentPosition->prepareDraftPosition()->preparePositionToDisplay();


        self::CreateView('ISSPositionView', ['currentPosition' => $currentPosition[0]]);

    }
}