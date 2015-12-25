<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/4/2015
 */

namespace exercises\gps\services;
use exercises\gps\entities\gpsPoint;

/**
 * Class customersLivingWithinASpecifiedDistance
 * @package exercises\gps\services
 */
class customersLivingWithinASpecifiedDistance
{

    /**
     * @var int
     */
    private $distance = 0;

    /**
     * @var null
     */
    private $gpsPointA = NULL;

    /**
     * @var array
     */
    private $customers = array();

    /**
     * @var null
     */
    private $fileLocation = NULL;

    /**
     * Function sets internal private property distance , throws an Exception if the argument is not a number
     *
     * @param $distance
     * @throws \Exception
     */
    public function setMaximumAllowedDistanceInMetres($distance)
    {
        if (is_numeric($distance)) {
            $this->distance = $distance;
        } else {
            throw new \Exception("Please enter a valid distance in Metres.");
        }
    }


    /**
     * Takes in an instantiated object of class gpsPoint
     *
     * @param \exercises\gps\entities\gpsPoint $gpsPointA
     *
     */
    public function setCoordinatesOfPointA(gpsPoint $gpsPointA)
    {
        $this->gpsPointA = $gpsPointA;
    }


    /**
     * Fills internal private property fileLocation, throws an error if the fileLocation being set does not exist
     *
     * @param $fileLocation
     * @throws \Exception
     */
    public function setLocationOfJSONFileContainingCustomerData($fileLocation)
    {
        if (!file_exists($fileLocation)) {
            throw new \Exception("Internal Error: File does not exist");
        } else {
            $this->fileLocation = $fileLocation;
        }
    }


    /**
     *
     * Uses the internal property fileLocation filled by setLocationOfJSONFileContainingCustomerData and retrieves
     * json data from the file. In a loop the method fills $customers Array from the decoded json data.
     *
     * @return mixed , customers array
     * @throws \Exception
     */
    private function getCustomerDataFromJSONFile()
    {
        if ($this->fileLocation == NULL) {
            throw new \Exception("Please set the file location first.");
        }
        $rawData = '{"customers":[';
        $rawData .= str_replace('}', '},', file_get_contents($this->getFileLocation()));
        $rawData = substr($rawData, 0, strlen($rawData) - 1);
        $rawData .= "]}";
        $decodedData = json_decode($rawData);
        foreach ($decodedData->customers as $customer) {
            $customers[$customer->user_id]['name'] = $customer->name;
            $customers[$customer->user_id]['latitude'] = $customer->latitude;
            $customers[$customer->user_id]['longitude'] = $customer->longitude;
        }
        ksort($customers);
        return $customers;
    }


    /**
     *
     * Uses the customers returned array from getCustomerDataFromJSONFile. The method
     * checks each customer against the gpsPointA and allowed distance to filter out
     * customers living within a specified distance.
     *
     * @return array
     * @throws \Exception
     */
    public function getCustomersWithinASpecifiedDistanceFromPointA()
    {
        if ($this->gpsPointA == NULL) {
            throw new \Exception("Please set the coordinates of Point A first.");
        } elseif ($this->distance == NULL) {
            throw new \Exception("Please enter the distance first.");
        }
        $customers = $this->getCustomerDataFromJSONFile();
        $filteredCustomers = array();
        foreach ($customers as $key => $customer) {
            $gpsPointB = new gpsPoint();
            $gpsPointB->setLatitude($customer['latitude']);
            $gpsPointB->setLongitude($customer['longitude']);
            $calculatedDistanceBetweenPointBAndA = distanceBetweenTwoGPSPoints::getDistanceBetweenTwoPoints($this->gpsPointA, $gpsPointB);
            if ($calculatedDistanceBetweenPointBAndA <= $this->distance) {
                $filteredCustomers[$key]['name'] = $customer['name'];
                $filteredCustomers[$key]['distance'] = $calculatedDistanceBetweenPointBAndA;
            }
            unset($calculatedDistanceBetweenPointBAndA);
            unset($gpsPointB);
        }
        return $filteredCustomers;
    }


    /**
     *
     * Retrieves the fileLocation by returning the property, throws an exception if the location has not been set
     *
     * @return null
     * @throws \Exception
     */
    public function getFileLocation(){
        if($this->fileLocation==NULL){
            throw new \Exception("Please set the file location first.");
        }
        else{
            return $this->fileLocation;
        }
    }


}