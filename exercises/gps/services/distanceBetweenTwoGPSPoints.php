<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/3/2015
 */

namespace exercises\gps\services;


/**
 * Class distanceBetweenTwoGPSPoints, used for calculating metres between 2 gps coordinates.
 * @package exercises\gps\services
 */
class distanceBetweenTwoGPSPoints
{
    const radiusOfEarthInMetres = 6371000; //metres

    /**
     * This function takes in objects of class gpsPoint where both latitude and
     * longitude are already set and calculates distance in metres between them
     *
     * @param \exercises\gps\entities\gpsPoint $gpsPoint1
     * @param \exercises\gps\entities\gpsPoint $gpsPoint2
     * @return float , distance rounded to metres
     * @throws \Exception
     */
    public static function getDistanceBetweenTwoPoints(\exercises\gps\entities\gpsPoint $gpsPoint1, \exercises\gps\entities\gpsPoint $gpsPoint2)
    {
        $latitudePointA = deg2rad($gpsPoint1->getLatitude());
        $longitudePointA = deg2rad($gpsPoint1->getLongitude());
        $latitudePointB = deg2rad($gpsPoint2->getLatitude());
        $longitudePointB = deg2rad($gpsPoint2->getLongitude());
        $longitudeDelta = $longitudePointA - $longitudePointB;

        $haversineFormula = atan2(sqrt(pow(cos($latitudePointB) * sin($longitudeDelta), 2) + pow(cos($latitudePointA) * sin($latitudePointB) - sin($latitudePointA) * cos($latitudePointB) * cos($longitudeDelta), 2))
            , sin($latitudePointA) * sin($latitudePointB) + (cos($latitudePointA) * cos($latitudePointB) * cos($longitudeDelta)));

        $arcDistanceInMetres = $haversineFormula * self::radiusOfEarthInMetres;
        return round($arcDistanceInMetres);
    }

}