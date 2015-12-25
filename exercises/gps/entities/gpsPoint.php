<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/3/2015
 */

namespace exercises\gps\entities;


/**
 * Class gpsPoint
 * @package exercises\gps\entities
 */
class gpsPoint
{

    /**
     * @var null
     */
    private $latitude = NULL;

    /**
     * @var null
     */
    private $longitude = NULL;

    /**
     * Sets the internal private property latitude , throws an exception if latitude is invalid.
     *
     * @param $latitude
     * @throws \Exception
     */
    public function setLatitude($latitude)
    {
        if ($latitude >= -90 && $latitude <= +90) {
            $this->latitude = $latitude;
        } else {
            throw new \Exception("Invalid Latitude value. Please enter a value between -90 and +90.");
        }
    }

    /**
     * Sets the internal private property longitude, throws an exception if longitude is invalid.
     *
     * @param $longitude
     * @throws \Exception
     */
    public function setLongitude($longitude)
    {
        if ($longitude >= -180 && $longitude <= 180) {
            $this->longitude = $longitude;
        } else {
            throw new \Exception ("Invalid Longitude value. Please enter a value between -180 and +180.");
        }

    }

    /**
     * Gets the internal private property latitude, throws an exception if latitude has not been set
     *
     * @return null
     * @throws \Exception
     */
    public function getLatitude()
    {
        if ($this->latitude != NULL) {
            return $this->latitude;
        } else {
            throw new \Exception ("You must first enter a value for the latitude before getting it.");
        }
    }

    /**
     *
     * Gets the internal private property longitude, throws an exception if longitude has not been set
     *
     * @return null
     * @throws \Exception
     */
    public function getLongitude()
    {
        if ($this->longitude != NULL) {
            return $this->longitude;
        } else {
            throw new \Exception ("You must first enter a value for the longitude before getting it.");
        }
    }
}