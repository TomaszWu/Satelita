<?php

namespace src\Model;

class ISSPositionModel
{

    public $currentLocation = [];

    public function __construct(){
        $this->currentLocation = self::findCurrentLocation();

    }

    /**
     * @return array
     */
    public function findCurrentLocation(){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "https://api.wheretheiss.at/v1/satellites/25544");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $result = curl_exec($ch);
        return json_decode($result);
    }
}