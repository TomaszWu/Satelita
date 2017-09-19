<?php
/**
 * Created by PhpStorm.
 * User: tomasz
 * Date: 09.09.17
 * Time: 21:31
 */

//namespace src\Classes;

class ISSPosition
{


    public function __construct(){}

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