<?php



class TranslatePosition
{

    const KEY_TO_API = 'AIzaSyC9TgSJSS_majHnmDK5oGS-gTRTRg-XUw0';

    public $draftPosition;


    public function __construct($ISSPostion){
        $this->ISSPostion = $ISSPostion;

    }

    public function prepareDraftPosition(){

        $latlng = $this->ISSPostion->latitude;
        $longitude = $this->ISSPostion->longitude;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latlng,$longitude&key=".self::KEY_TO_API);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
        );
        $result = curl_exec($ch);

        $this->draftPosition =  (array)json_decode($result);

        return $this;
    }

    public function preparePositionToDisplay(){

        return (array)$this->draftPosition['results'][0]->formatted_address;

    }






}