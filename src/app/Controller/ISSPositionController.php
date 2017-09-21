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
    public function showPosition(){

        $location = new ISSPositionModel();

        $location = $location->findCurrentLocation();

        $currentPosition = new TranslatePosition($location);

        $currentPosition = $currentPosition->prepareDraftPosition()->preparePositionToDisplay();

        $this->CreateView('ISSPositionView', ['currentPosition' => $currentPosition[0]]);

    }
}