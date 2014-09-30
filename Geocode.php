<?php
/**
 * Created by PhpStorm.
 * User: abdulrazakalkl
 * Date: 9/30/14
 * Time: 1:23 PM
 */

/**
 * Geocode class file.
 *
 * @author Abdulrazak Alkel <abdulrazaqalkl@gmail.com>
 * @link https://github.com/Abdulrazak-Alkl/yii-geocode
 * @version 0.1
 */

class Geocode extends CApplicationComponent{

    // Visit the APIs console at https://code.google.com/apis/console and log in with your Google Account.
    public $API_KEY;

    // Google Maps API for Work users must include valid client and signature parameters with their Geocoding requests.
    public $client;
    public $signature;

    // The request format: https://maps.googleapis.com/maps/api/geocode/json?parameters
    public $request = 'https://maps.googleapis.com/maps/api/geocode/json?';

    /**
     * Required parameters in a geocoding request
     */

    // The address that you want to geocode
    public $address;

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

    public function lookupByAddress($address){

    }

    public function lookupByCoordinates($Coordinates){

    }


}