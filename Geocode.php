<?php

/**
 * Geocode class file.
 *
 * @author Abdulrazak Alkel <abdulrazaqalkl@gmail.com>
 * @link https://github.com/Abdulrazak-Alkl/yii-geocode
 * @version 0.1
 */

//'geocode' => array (
//    'class' => 'application.components.Geocode',
//    'API_KEY' => '', // get your key from Google Developer Console
//    'client' => '', 'signature' => '', // must set for Business users instead of a key.
//    // optional filters
//    'language' => '',
//    'region' => '',
//    'components' => array(
//        'route' => '',
//        'locality' => '',
//        'administrative_area' => '',
//        'postal_code' => '',
//        'country' => '',
//    ),
//    'bounds' => array(
//        'northeast' => array(
//            'lat' => -23.5370283,
//            'lng' => -46.8357228
//        ),
//        'southwest' => array(
//            'lat' => -23.5373732,
//            'lng' => -46.8374628
//        )
//    )
//)

class Geocode extends CApplicationComponent{

    // Visit the APIs console at https://code.google.com/apis/console and log in with your Google Account.
    public $API_KEY;

    // Maps for Business users must include client and signature parameters with their requests instead of a key.
    public $client;
    public $signature;

    // The request format: https://maps.googleapis.com/maps/api/geocode/json?parameters
    private $request = 'https://maps.googleapis.com/maps/api/geocode/json';

    /**
     *  Optional parameters in a geocoding request
     */

    // bounds — The bounding box of the viewport within which to bias geocode results more prominently.
    // 34.172684,-118.604794|34.236144,-118.500938
    public $bounds = array(
        'northeast' => array(
            'lat' => 0,
            'lng' => 0,
        ),
        'southwest' => array(
            'lat' => 0,
            'lng' => 0,
        ),
    );

    //language — The language in which to return results.
    public $language;

    //region — The region code, specified as a ccTLD ("top-level domain") two-character value.
    public $region;

    //components — The component filters, separated by a pipe (|). Each component filter consists of a component:value pair and will fully restrict the results from the geocoder. For more information see Component Filtering, below.
    private $components = array(
        'route' => '',
        'locality' => '',
        'administrative_area' => '',
        'postal_code' => '',
        'country' => '',
    );

    public function init(){
    }

    /**
     * @param $address string Address that you want to geocode
     * @return array Coordinates
     */
    public function lookupByAddress($address){
        $params = $this->getOptions();
        $params['address'] = $address;
        return Yii::app()->curl->get($this->request, $params);
    }

    public function lookupByCoordinates($Coordinates){

    }

    public function getOptions(){
        $options = array();
        $options['components'] = '';
        if (!empty($this->API_KEY))
           $options['key'] = $this->API_KEY;
        if (!empty($this->client))
            $options['client'] = $this->client;
        if (!empty($this->signature))
            $options['signature'] = $this->signature;
        if (!empty($this->language))
            $options['language'] = $this->language;
        if (!empty($this->region))
            $options['region'] = $this->region;

        if (!empty($this->components['route']))
            $options['components']['route'] = $this->components['route'];
        if (!empty($this->components['locality']))
            $options['components']['locality'] = $this->components['locality'];
        if (!empty($this->components['administrative_area']))
            $options['components']['administrative_area'] = $this->components['administrative_area'];
        if (!empty($this->components['postal_code']))
            $options['components']['postal_code'] = $this->components['postal_code'];
        if (!empty($this->components['country']))
            $options['components']['country'] = $this->components['country'];

        if (!empty($this->bounds['northeast']) || !empty($this->bounds['southwest']))
            $options['bounds'] = $this->bounds['northeast']['lat'].','.$this->bounds['northeast']['lng']
                .'|'. $this->bounds['southwest']['lat'].','.$this->bounds['southwest']['lng'];

        return $options;
    }

}