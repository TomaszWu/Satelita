<?php

namespace src\Model;

class ISSPositionModel
{

    /**
     * @var string
     */
    public $latitude;

    /**
     * @var string
     */
    public $longitude;


    public function __construct($latitude = 0, $longitude = 0){
        $this->longitude = $latitude;
        $this->longitude = $longitude;
    }

    /**
     * @return object
     */
    public function findCurrentLocation(){

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "https://api.wheretheiss.at/v1/satellites/25544");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $result = curl_exec($ch);
        $result = json_decode($result, true);
        $currentLocation = new ISSPositionModel();
        $currentLocation->setLatitude($result['latitude']);
        $currentLocation->setLongitude($result['longitude']);

        return $currentLocation;
    }


    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return int
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param int $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }


}