<?php

class ISSPositionModel
{


    public function __construct(){}


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