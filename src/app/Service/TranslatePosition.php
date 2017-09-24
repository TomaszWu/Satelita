<?php

namespace src\Service;

use src\Model\ISSPositionModel;

/**
 * Class TranslatePosition
 */
class TranslatePosition
{

    /**
     * @var string key to google API
     */
    const KEY_TO_API = 'AIzaSyC9TgSJSS_majHnmDK5oGS-gTRTRg-XUw0';

    /**
     * @var array
     */
    public $draftPosition;


    public function __construct(ISSPositionModel $ISSPosition){
        $this->ISSPosition = $ISSPosition;

    }



    /**
     * Function that passes ISS' latitude and longitude to google API and returns current position and address
     * @return object
     */
    public function prepareDraftPosition(){

        $latitude = $this->ISSPosition->getLatitude();
        $longitude = $this->ISSPosition->getLatitude();

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitude,$longitude&key=".self::KEY_TO_API);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $result = curl_exec($ch);

        $this->setDraftPosition((array)json_decode($result, true));
        return $this;
    }

    /**
     * Function that prepares ISS position to display
     * @return array
     */
    public function preparePositionToDisplay(){


        if(empty((array)$this->draftPosition['results'])){
            return array(0 => 'Stacja znajduje się gdzieś nad którymś z oceanów lub innym dużym zbiornikiem wodnym.');

        }
        return (array)$this->draftPosition['results'][0]['formatted_address'];

    }

    /**
     * @param mixed $draftPosition
     */
    public function setDraftPosition($draftPosition)
    {
        $this->draftPosition = $draftPosition;
    }

    /**
     * @return mixed
     */
    public function getDraftPosition()
    {
        return $this->draftPosition;
    }






}